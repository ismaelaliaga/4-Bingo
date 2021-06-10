<?php
declare(strict_types=1);

namespace Daw\Tests\Carton;

use Daw\Bingo\Carton;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Daw\Bingo\Carton
 */
class CartonTest extends TestCase{
    /**
     *
     * @covers ::devolverID()
     */
    public function testLaFuncionDevolveridDevuelveUnInt(){
        //given
        $sut = new Carton;

        //when
        $espero = $sut->devolverID();
        
        //then
        $this->assertIsInt($espero);
    }

    /**
     *
     * @covers ::obtenerEstado()
     */
    public function testLaFuncionObtenerestadoDevuelveUnString(){
        //given
        $sut = new Carton;

        //when
        $espero = $sut->obtenerEstado();
        
        //then
        $this->assertIsString($espero);
    }

    /**
    * @covers ::construct()
    */
    public function testLosObjetosDeLaClaseCartonTienenElAtributoCorrecto(){
        //Given
        $sut = new Carton;
        
        //When
        $primerAtributo = "carton";
        $segundoAtributo = "id";

        //Then
        $this->assertObjectHasAttribute($primerAtributo, $sut);
        $this->assertObjectHasAttribute($segundoAtributo, $sut);
    }

    /**
    * @covers ::construct()
    */
    public function testElNúmeroMáximoQueElConstructLePoneAlIdEs60(){
        //Given
        $sut = new Carton;
        $id = $sut->devolverID();
        //When
        $espero = 60;

        //Then
        $this->assertLessThanOrEqual($espero, $id);
    }

    /**
    * @covers ::sacarBola()
    */
    public function testElNúmeroMínimoQueElConstructLePoneAlIdEs1(){
        //Given
        $sut = new Carton;
        $id = $sut->devolverID();

        //When
        $espero = 1;

        //Then
        $this->assertGreaterThanOrEqual($espero, $id);
    }

    /**
    * @covers ::construct()
    */
    public function testElConstructCreaUnObjeto(){
        //Given 
        $sut = new Carton;

        //When
        $objeto = $sut;

        //Then
        $this->assertIsObject($objeto);
    }
}