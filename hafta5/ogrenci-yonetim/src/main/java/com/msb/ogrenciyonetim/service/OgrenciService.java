package com.msb.ogrenciyonetim.service;

import com.msb.ogrenciyonetim.model.Ogrenci;
import com.msb.ogrenciyonetim.repository.OgrenciRepository;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class OgrenciService {

    private final OgrenciRepository repo;

    public OgrenciService(OgrenciRepository repo) {
        this.repo = repo;
    }

    public List<Ogrenci> listAll() {
        return repo.findAll();
    }

    public Optional<Ogrenci> findById(Long id) {
        return repo.findById(id);
    }

    public Ogrenci save(Ogrenci ogrenci) {
        return repo.save(ogrenci);
    }

    public void delete(Long id) {
        repo.deleteById(id);
    }
}
