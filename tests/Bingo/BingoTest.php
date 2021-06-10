<?php
declare(strict_types=1);

namespace Daw\Tests\Bingo;

use Daw\Bingo\Bingo;
use Daw\Bingo\Jugador;
use Daw\Bingo\Carton;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Daw\Bingo\Bingo
 */
class BingoTest extends TestCase{
    /**
     *
     * @covers ::getJugadores()
     */
    public function testLaFuncionGetjugadoresDevuelveUnArray(){
        //given
        $sut = new Bingo("Ismael", 1, "foto1", "Andrés", 2, "foto2", "Rafa", 3, "foto3", "Alberto", 1, "foto4");

        //when
        $espero = $sut->getJugadores();
        
        //then
        $this->assertIsArray($espero);
    }

    /**
     *
     * @covers ::construct()
     */
    public function testLosAtributosDelObjetoCreadoPorElConstructSonObjetos(){
        //given
        $sut = new Bingo("Ismael", 1, "foto1", "Andrés", 2, "foto2", "Rafa", 3, "foto3", "Alberto", 1, "foto4");
        $arrayConLosJugadores = $sut->getJugadores();

        //when
        $primerAtributo = $arrayConLosJugadores[0];
        $segundoAtributo = $arrayConLosJugadores[1];
        $tercerAtributo = $arrayConLosJugadores[2];
        $cuartoAtributo = $arrayConLosJugadores[3];
        
        //then
        $this->assertIsObject($primerAtributo);
        $this->assertIsObject($segundoAtributo);
        $this->assertIsObject($tercerAtributo);
        $this->assertIsObject($cuartoAtributo);
    }

    /**
     *
     * @covers ::construct()
     */
    public function testLosAtributosDelObjetoBingoSonObjetosDeLaClaseJugador(){
        //given
        $sut = new Bingo("Ismael", 1, "foto1", "Andrés", 2, "foto2", "Rafa", 3, "foto3", "Alberto", 1, "foto4");
        $arrayConLosJugadores = $sut->getJugadores();

        //when
        $primerAtributo = $arrayConLosJugadores[0];
        $segundoAtributo = $arrayConLosJugadores[1];
        $tercerAtributo = $arrayConLosJugadores[2];
        $cuartoAtributo = $arrayConLosJugadores[3];
        
        //then
        $this->assertInstanceOf($primerAtributo::class, new Jugador("Ismael", 1, "foto1"));
        $this->assertInstanceOf($segundoAtributo::class, new Jugador("Andrés", 2, "foto2"));
        $this->assertInstanceOf($tercerAtributo::class, new Jugador("Rafa", 3, "foto3"));
        $this->assertInstanceOf($cuartoAtributo::class, new Jugador("Alberto", 1, "foto4"));
    }

    /**
    * @covers ::construct()
    */
    public function testElConstructCreaUnObjeto(){
        //Given 
        $sut = new Bingo("Ismael", 1, "foto1", "Andrés", 2, "foto2", "Rafa", 3, "foto3", "Alberto", 1, "foto4");

        //When
        $objeto = $sut;

        //Then
        $this->assertIsObject($objeto);
    }
}