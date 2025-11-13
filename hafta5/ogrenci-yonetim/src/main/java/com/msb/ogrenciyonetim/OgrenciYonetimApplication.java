package com.msb.ogrenciyonetim;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.autoconfigure.domain.EntityScan;

@SpringBootApplication
@EntityScan("com.msb.ogrenciyonetim.model")
public class OgrenciYonetimApplication {
	public static void main(String[] args) {
		SpringApplication.run(OgrenciYonetimApplication.class, args);
	}
}
