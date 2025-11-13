const tableBody = document.querySelector('#studentsTable tbody');
const form = document.getElementById('studentForm');
const modalTitle = document.querySelector('#studentModal .modal-title');
const studentModal = new bootstrap.Modal(document.getElementById('studentModal'));
document.getElementById('btnAdd').addEventListener('click', () => {
    modalTitle.textContent = 'Öğrenci Ekle';
    form.reset();
    document.getElementById('studentId').value = '';
});

// Fetch & render
async function loadStudents() {
    const res = await fetch('/api/students');
    const data = await res.json();
    tableBody.innerHTML = '';
    data.forEach(s => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
      <td>${s.id}</td>
      <td>${escapeHtml(s.ad)}</td>
      <td>${escapeHtml(s.soyad)}</td>
      <td>${escapeHtml(s.sinif || '')}</td>
      <td>${s.yas ?? ''}</td>
      <td>
        <button class="btn btn-sm btn-primary me-1" onclick="edit(${s.id})">Güncelle</button>
        <button class="btn btn-sm btn-danger" onclick="remove(${s.id})">Sil</button>
      </td>`;
        tableBody.appendChild(tr);
    });
}

function escapeHtml(text = '') {
    return text.replaceAll('&','&amp;').replaceAll('<','&lt;').replaceAll('>','&gt;');
}

async function edit(id) {
    const res = await fetch(`/api/students/${id}`);
    if (!res.ok) { alert('Öğrenci bulunamadı'); return; }
    const s = await res.json();
    modalTitle.textContent = 'Öğrenci Güncelle';
    document.getElementById('studentId').value = s.id;
    document.getElementById('ad').value = s.ad;
    document.getElementById('soyad').value = s.soyad;
    document.getElementById('sinif').value = s.sinif || '';
    document.getElementById('yas').value = s.yas || '';
    studentModal.show();
}

async function remove(id) {
    if (!confirm('Bu öğrenciyi silmek istediğinize emin misiniz?')) return;
    const res = await fetch(`/api/students/${id}`, { method: 'DELETE' });
    if (res.status === 204) {
        loadStudents();
    } else {
        alert('Silme başarısız oldu');
    }
}

form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const id = document.getElementById('studentId').value;
    const payload = {
        ad: document.getElementById('ad').value.trim(),
        soyad: document.getElementById('soyad').value.trim(),
        sinif: document.getElementById('sinif').value.trim(),
        yas: parseInt(document.getElementById('yas').value) || null
    };
    if (!payload.ad || !payload.soyad) { alert('Ad ve Soyad gerekli'); return; }

    if (id) {
        const res = await fetch(`/api/students/${id}`, {
            method: 'PUT',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(payload)
        });
        if (res.ok) {
            studentModal.hide();
            loadStudents();
        } else {
            alert('Güncelleme başarısız');
        }
    } else {
        const res = await fetch('/api/students', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(payload)
        });
        if (res.status === 201) {
            studentModal.hide();
            loadStudents();
        } else {
            alert('Ekleme başarısız');
        }
    }
});

// başlangıç
loadStudents();
