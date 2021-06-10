<?php

declare(strict_types=1);

namespace Daw\Tests\Bingo;

use Daw\Bingo\Bombo;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Daw\Bingo\Bombo
 */
class BomboTest extends TestCase{

    /**
    * @covers ::sacarBola()
    */
    public function testElMetodoSacarBolaDevuelveInt(){
        //Given
        $sut = new Bombo;
        
        //When
        $espero = $sut->sacarBola();

        //Then
        $this->assertIsInt($espero);
    }

    // /**
    // * @covers ::sacarBola()
    // */
    // public function testElMetodoSacarBolaEscribeLaBolaSacadaEnElTxtCorrespondiente(){
    //     //Given
    //     $sut = new Bombo;
    //     $bola = $sut->sacarBola();
    //     $bola = "$bola";
    //     $fichero = fopen(__DIR__ . "/bolas.txt", "rb+");
    //     fwrite($fichero, $bola);
    //     fclose($fichero);

    //     $fichero = fopen(__DIR__ . "/bolas.txt", "rb+");

    //     //When
    //     $espero = fgets($fichero);
    //     fclose($fichero);

    //     //Then
    //     $this->assertSame($bola, $espero);
    // }

    /**
    * @covers ::construct()
    */
    public function testLosObjetosDeLaClaseBomboTienenElAtributoCorrecto(){
        //Given
        $sut = new Bombo;
        
        //When
        $espero = "bolas";

        //Then
        $this->assertObjectHasAttribute($espero, $sut);
    }

    /**
    * @covers ::sacarBola()
    */
    public function testElNúmeroMáximoQueDevuelveSacarBolaEs90(){
        //Given
        $sut = new Bombo;
        $bola = $sut->sacarBola();

        //When
        $espero = 90;

        //Then
        $this->assertLessThanOrEqual($espero, $bola);
    }

    /**
    * @covers ::sacarBola()
    */
    public function testElNúmeroMínimoQueDevuelveSacarBolaEs0(){
        //Given
        $sut = new Bombo;
        $bola = $sut->sacarBola();

        //When
        $espero = 0;

        //Then
        $this->assertGreaterThanOrEqual($espero, $bola);
    }

    /**
    * @covers ::construct()
    */
    public function testElConstructCreaUnObjeto(){
        //Given 
        $sut = new Bombo;

        //When
        $objeto = $sut;

        //Then
        $this->assertIsObject($objeto);
    }
}

