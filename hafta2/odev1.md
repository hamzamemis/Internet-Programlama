# İnternet Programlama ve Ağ Protokolleri Özeti

#Bölüm 1: Genel İnternet Programlama

## 1. İnternetin temel çalışma prensibini kısaca açıklayınız.
İnternet, bilgisayarların ve cihazların birbirine veri paketleri gönderip almasını sağlayan bir ağlar ağıdır. Veriler, IP adresleri ve protokoller (TCP/IP) aracılığıyla paketler halinde iletilir ve hedefe ulaştığında tekrar birleştirilir.

## 2. IP adresi ve DNS arasındaki farkı açıklayınız.
- **IP adresi:** Bir cihazın internetteki benzersiz sayısal kimliğidir (ör. 192.168.1.1).  
- **DNS:** İnsanların hatırlaması kolay alan adlarını (ör. google.com) IP adreslerine çeviren sistemdir.

## 3. TCP ve UDP arasındaki farkları belirtiniz.
- **TCP:** Bağlantı odaklıdır, verilerin sıralı ve eksiksiz ulaşmasını garanti eder, hata kontrolü vardır.  
- **UDP:** Bağlantısızdır, hızlıdır ama veri kaybı veya sıralama garantisi yoktur; genellikle canlı yayın ve oyunlarda kullanılır.

## 4. HTTP protokolü hangi katmanda çalışır ve temel özellikleri nelerdir?
- **Katman:** Uygulama katmanı  
- **Temel özellikler:**  
  - Metin tabanlıdır  
  - İstemci-sunucu modelini kullanır  
  - Durumsuz (stateless) bir protokoldür; her isteği bağımsız işler

## 5. Web tarayıcıları nasıl çalışır? Bir web sayfasını yükleme sürecini adım adım açıklayınız.
1. Kullanıcı URL girer  
2. Tarayıcı DNS sorgusu yapar ve IP adresini alır  
3. Tarayıcı sunucuya TCP/IP ile bağlanır  
4. HTTP isteği (GET/POST) gönderilir  
5. Sunucu yanıt verir, HTML/CSS/JS dosyaları gelir  
6. Tarayıcı içerikleri işler ve sayfayı render eder  
7. Ek kaynaklar (resim, video, vb.) yüklenir ve sayfaya yerleştirilir

## 6. Frontend ve Backend arasındaki fark nedir? Örneklerle açıklayınız.
- **Frontend:** Kullanıcının gördüğü ve etkileşimde bulunduğu kısımdır. Örnek: HTML, CSS, JavaScript ile yapılan sayfa tasarımı, menüler, butonlar  
- **Backend:** Tarayıcıdan görünmeyen, verileri işleyen kısımdır. Örnek: Kullanıcı doğrulama, veritabanı işlemleri, sunucu mantığı (PHP, Python, Java)

## 7. JSON ve XML arasındaki farkları açıklayınız.
- **JSON:** Hafif, okunması kolay, JavaScript ile uyumlu, veri alışverişinde hızlı  
- **XML:** Daha ağır, etiket tabanlı, esnek ama okunması daha zor, veri yapısı ve şema tanımlamada güçlü

## 8. Restful API nedir? Ne amaçla kullanılır?
**RESTful API**, HTTP protokolünü kullanarak istemci ve sunucu arasında veri alışverişi yapan, kaynak odaklı bir web servisidir.  
**Amaç:** Farklı sistemlerin birbirine veri göndermesini ve almasını standart ve esnek bir şekilde sağlamak

## 9. Güvenli internet iletişimi için kullanılan HTTPS protokolünün avantajlarını açıklayınız.
- Veriler **şifrelenir**, üçüncü kişiler tarafından okunamaz  
- Sunucunun **kimliği doğrulanır** (sertifika ile)  
- Veri bütünlüğü sağlanır; iletim sırasında **değiştirilmesi önlenir**  
- Kullanıcı güvenini artırır, kişisel bilgilerin çalınmasını zorlaştırır

## 10. Çerezler (Cookies) nedir? Web sitelerinde nasıl kullanılır?
**Çerezler (Cookies):** Kullanıcının tarayıcısında saklanan küçük veri dosyalarıdır  
**Kullanım alanları:**  
- Oturum bilgilerini hatırlamak (login durumu)  
- Kullanıcı tercihlerini kaydetmek (tema, dil)  
- Ziyaretçi davranışlarını takip etmek ve kişiselleştirilmiş içerik sunmak

#Bölüm 2: HTML ve CSS

## 1. Aşağıdaki HTML kodunun çıktısını tahmin ediniz:
```html
<!DOCTYPE html>
<html>
<head>
 <title>Örnek Sayfa</title>
</head>
<body>
 <h1>Merhaba Dünya!</h1>
 <p>Bu bir paragraf.</p>
 <a href="https://www.google.com">Google'a git</a>
</body>
</html>
```
**Çıktı:**
```
Merhaba Dünya!  (büyük başlık)
Bu bir paragraf.
Google'a git (tıklanınca Google’a yönlendirir)
```

## 2. `<div>` ve `<span>` etiketleri arasındaki farkı açıklayınız
- **`<div>`:** Blok düzeyinde bir etikettir; yeni satırdan başlar ve sayfanın genişliğini kaplar.  
- **`<span>`:** Satır içi (inline) etikettir; metin içinde küçük alanları biçimlendirmek için kullanılır.

## 3. HTML’de form elemanlarından en az 5 tanesini açıklayınız.
1. `<input>` – Tek satırlık veri girişi (metin, parola, e-posta vb.)  
2. `<textarea>` – Çok satırlı metin girişi  
3. `<select>` – Açılır menü oluşturur  
4. `<option>` – `<select>` içinde seçenekleri tanımlar  
5. `<button>` – Formu göndermek veya işlem başlatmak için buton

## 4. CSS’te ID ve Class seçicilerinin farkı ve örnekleri
### 4.1 ID ve Class farkı
- **ID (`#`)**: Sayfada yalnızca bir öğe için kullanılır, benzersizdir  
- **Class (`.`)**: Birden fazla öğeye uygulanabilir


```html
<p id="ozel">ID Örneği</p> 
<p class="kirmizi">Class Örneği</p>
```
```css
#ozel { color: blue; }
.kirmizi { color: red; }
```
### 4.2
```css
p {
 color: red;
 font-size: 16px;
}
```
**Cevap:** Bu CSS kodu, sayfadaki tüm `<p>` (paragraf) elementlerine uygulanır. Tüm paragraflar kırmızı renkte ve 16px boyutunda görüntülenir.

## 5. HTML5’te yeni gelen en az 3 etiketi açıklayınız.
1. `<header>` – Sayfanın veya bölümün üst kısmı  
2. `<article>` – Bağımsız içerik parçaları  
3. `<footer>` – Sayfanın veya bölümün alt kısmı

## 6. CSS Flexbox ile bir div öğesini yatay ve dikey olarak nasıl ortalarsınız?
```html
<div class="kapsayici">
  <div class="icerik">Ortalanmış Kutu</div>
</div>
```

```css
.kapsayici {
  display: flex;
  justify-content: center; /* Yatay ortalama */
  align-items: center;     /* Dikey ortalama */
  height: 100vh;
}
```

## 7. Responsive web tasarım nedir? Örnek bir CSS media query yazınız.
Responsive web tasarım, sayfanın farklı ekran boyutlarına uyumlu görünmesini sağlar.

```css
body { font-size: 18px; }

@media (max-width: 600px) {
  body { font-size: 14px; }
}
```

## 8. HTML tablolarında satır ve sütunları birleştirmek için hangi etiketler kullanılır?
- `rowspan`: Satır birleştirme  
- `colspan`: Sütun birleştirme

```html
<td rowspan="2">2 Satırı kaplar</td>
<td colspan="3">3 Sütunu kaplar</td>
```

## 9. CSS ile bir butona hover efekti nasıl eklenir? Örnek kod yazınız.
```html
<button class="buton">Tıkla Beni</button>
```

```css
.buton {
  background-color: blue;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s;
}
.buton:hover {
  background-color: green;
}
```
#Bölüm 3: Ağ Protokolleri

## 1. HTTP ve HTTPS arasındaki temel farkları açıklayınız.
- **HTTP:** Veriler şifrelenmeden iletilir, hızlıdır ama güvenli değildir  
- **HTTPS:** Veriler SSL/TLS ile şifrelenir, güvenli iletişim sağlar, kimlik doğrulaması yapılabilir

## 2. FTP nedir? Hangi amaçlarla kullanılır?
**FTP (File Transfer Protocol)**, internet üzerinden dosya gönderme ve alma protokolüdür. Genellikle sunucuya dosya yükleme, indirme ve dosya yönetimi için kullanılır.

## 3. SMTP ve POP3 protokolleri arasındaki farkı açıklayınız.
- **SMTP:** E-posta gönderme protokolüdür  
- **POP3:** E-postaları sunucudan çekmek için kullanılır; mesajları indirir ve genellikle sunucudan siler

## 4. DNS nedir? Çalışma mantığını kısaca anlatınız.
**DNS (Domain Name System)**, alan adlarını IP adreslerine çeviren sistemdir. Kullanıcı URL girince tarayıcı DNS sorgusu yapar, sunucunun IP adresi bulunur ve bağlantı sağlanır.

## 5. DHCP protokolü ne işe yarar?
**DHCP (Dynamic Host Configuration Protocol)**, ağdaki cihazlara otomatik olarak IP adresi, alt ağ maskesi ve varsayılan ağ geçidi atayan protokoldür.

## 6. HTTP 404 ve HTTP 500 hata kodları ne anlama gelir?
- **404:** İstenen sayfa bulunamadı  
- **500:** Sunucu hatası, sunucu isteği işlerken hata oluştu

## 7. Telnet ve SSH arasındaki farkı açıklayınız
- **Telnet:** Şifrelenmemiş bağlantı, güvenli değil  
- **SSH:** Şifreli, güvenli bağlantı sağlar, uzak sunucu yönetimi için kullanılır

## 8. VPN nedir ve hangi amaçlarla kullanılır?
**VPN (Virtual Private Network)**, internet trafiğini şifreleyerek güvenli ve özel bir ağ üzerinden yönlendiren teknolojidir.  
**Amaçlar:** Gizlilik, güvenlik, coğrafi kısıtlamaları aşmak, uzak ağlara güvenli erişim

## 9. WebSockets nedir? Nasıl çalışır?
**WebSockets**, istemci ve sunucu arasında sürekli açık, çift yönlü iletişim sağlayan protokoldür. Sayfa yenilenmeden gerçek zamanlı veri aktarımı sağlar.

## 10. CDN (Content Delivery Network) nedir? Web sitelerinde nasıl kullanılır?
**CDN**, içerikleri (resim, video, JS, CSS) dünya genelindeki sunuculara dağıtan sistemdir.  
**Kullanım:** İçerikler en yakın sunucudan yüklenir, sayfa yükleme hızını artırır ve sunucu yükünü azaltır.
