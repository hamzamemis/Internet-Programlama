package com.msb.ogrenciyonetim.model;

import jakarta.persistence.*;

@Entity
@Table(name = "ogrenci")
public class Ogrenci {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private String ad;
    private String soyad;
    private String sinif;
    private Integer yas;

    public Ogrenci() {}

    public Ogrenci(String ad, String soyad, String sinif, Integer yas) {
        this.ad = ad;
        this.soyad = soyad;
        this.sinif = sinif;
        this.yas = yas;
    }


    public Long getId() { return id; }
    public void setId(Long id) { this.id = id; }
    public String getAd() { return ad; }
    public void setAd(String ad) { this.ad = ad; }
    public String getSoyad() { return soyad; }
    public void setSoyad(String soyad) { this.soyad = soyad; }
    public String getSinif() { return sinif; }
    public void setSinif(String sinif) { this.sinif = sinif; }
    public Integer getYas() { return yas; }
    public void setYas(Integer yas) { this.yas = yas; }
}
