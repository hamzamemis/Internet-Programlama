package com.msb.ogrenciyonetim.repository;

import com.msb.ogrenciyonetim.model.Ogrenci;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface OgrenciRepository extends JpaRepository<Ogrenci, Long> {

}
