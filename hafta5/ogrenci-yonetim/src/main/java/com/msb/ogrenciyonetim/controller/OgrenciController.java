package com.msb.ogrenciyonetim.controller;

import com.msb.ogrenciyonetim.model.Ogrenci;
import com.msb.ogrenciyonetim.service.OgrenciService;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.*;

import java.net.URI;
import java.util.List;

@Controller
public class OgrenciController {

    private final OgrenciService service;

    public OgrenciController(OgrenciService service) {
        this.service = service;
    }


    @GetMapping("/")
    public String home() {
        return "forward:/index.html";
    }

    // ---------- REST API ----------
    @GetMapping("/api/students")
    public ResponseEntity<List<Ogrenci>> listAll() {
        return ResponseEntity.ok(service.listAll());
    }

    @GetMapping("/api/students/{id}")
    public ResponseEntity<Ogrenci> getOne(@PathVariable Long id) {
        return service.findById(id)
                .map(ResponseEntity::ok)
                .orElseGet(() -> ResponseEntity.notFound().build());
    }

    @PostMapping("/api/students")
    public ResponseEntity<Ogrenci> create(@RequestBody Ogrenci ogrenci) {
        Ogrenci saved = service.save(ogrenci);
        return ResponseEntity.created(URI.create("/api/students/" + saved.getId())).body(saved);
    }

    @PutMapping("/api/students/{id}")
    public ResponseEntity<Ogrenci> update(@PathVariable Long id, @RequestBody Ogrenci payload) {
        return service.findById(id).map(existing -> {
            existing.setAd(payload.getAd());
            existing.setSoyad(payload.getSoyad());
            existing.setSinif(payload.getSinif());
            existing.setYas(payload.getYas());
            Ogrenci updated = service.save(existing);
            return ResponseEntity.ok(updated);
        }).orElseGet(() -> ResponseEntity.notFound().build());
    }

    @DeleteMapping("/api/students/{id}")
    public ResponseEntity<Void> delete(@PathVariable Long id) {
        return service.findById(id).map(ex -> {
            service.delete(id);
            return ResponseEntity.noContent().<Void>build();
        }).orElseGet(() -> ResponseEntity.notFound().build());
    }
}
