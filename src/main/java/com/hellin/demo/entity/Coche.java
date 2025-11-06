package com.hellin.demo.entity;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

import java.time.LocalDate;

@Entity
public class Coche {

        @Id
        @GeneratedValue(strategy = GenerationType.IDENTITY)
        private long id;
        private String nombre;
        private LocalDate fecha_fabricacion;
        private String precio;
        private String categoria;
        private boolean comprado;
        
        
        public boolean iscomprado() {
            return comprado;
        }
        public void setcomprado(boolean comprado) {
            this.comprado = comprado;
        }
        public long getId() {
            return id;
        }
        public void setId(long id) {
            this.id = id;
        }
        public String getNombre() {
            return nombre;
        }
        public void setNombre(String nombre) {
            this.nombre = nombre;
        }
        public LocalDate getFecha_fabricacion() {
            return fecha_fabricacion;
        }
        public void setFecha_fabricacion(LocalDate fecha_fabricacion) {
            this.fecha_fabricacion = fecha_fabricacion;
        }
        public String getPrecio() {
            return precio;
        }
        public void setPrecio(String precio) {
            this.precio = precio;
        }
        public String getCategoria() {
            return categoria;
        }
        public void setCategory(String categoria) {
            this.categoria = categoria;
        }
}
