package com.hellin.demo.controller;



import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;

import org.springframework.web.bind.annotation.RestController;

import java.util.List;
import com.hellin.demo.entity.Coche;
import com.hellin.demo.repository.CocheRepository;
import org.springframework.web.bind.annotation.PostMapping;


@RestController
@RequestMapping("/coche")
/**
 * En este controlador se espone los enpoint referentes a Pets 
 * @version 1.0
 * @author Brahim Hanaoui Karbab
 */
public class CocheController{


    private CocheRepository CocheRepository;

    public CocheController(CocheRepository CocheRepository) {
        this.CocheRepository = CocheRepository;
    }  

    /**
     * Este method devuelve el listado de mascotas
     * @return List<Coche> informacion de cada mascota
     */

    @GetMapping ("/list")
    public List<Coche> hello() {
        return CocheRepository.findAll();
        
    }

    @PostMapping("/comprar/{id}")
    // RedirectView --> redirigir al navegador a otra URL desde un controlador.
    public Coche comprar(@PathVariable long id) {
        Coche coche = CocheRepository.findById(id).get();

         coche.setcomprado(true);
        return CocheRepository.save(coche);
        
        
    }
}




