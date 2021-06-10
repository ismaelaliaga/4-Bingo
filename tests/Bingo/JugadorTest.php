<?php
declare(strict_types=1);

namespace Daw\Tests\Bingo;

use PHPUnit\Framework\TestCase;
use Daw\Bingo\Jugador;
/**
 * @coversDefaultClass \Daw\Bingo\Jugador
 */
class JugadorTest extends TestCase{
    /**
     *
     * @covers ::construct()
     */
    public function testElConstructLeDefineElAtributoNombreAlObjeto(){
        //given
        $sut = new Jugador("Ismael", 1, "foto1");

        //when
        $espero = "nombre";
        
        //then
        $this->assertObjectHasAttribute($espero, $sut);
    }

    /**
     *
     * @covers ::getCartones()
     */
    public function testLaFuncionGetcartonesDevuelveUnArray(){
        //given
        $sut = new Jugador("Ismael", 1, "foto1");

        //when
        $espero = $sut->getCartones();
        
        //then
        $this->assertIsArray($espero);
    }

    /**
     *
     * @covers ::getCartones()
     */
    public function testLosAtributosDelObjetoCreadoPorElConstructSonObjetos(){
        //given
        $sut = new Jugador("Ismael", 3, "foto1");
        $arrayConLosCartones = $sut->getCartones();

        //when
        $primerCarton = $arrayConLosCartones[0];
        $segundoCarton = $arrayConLosCartones[1];
        $tercerCarton = $arrayConLosCartones[2];
        
        //then
        $this->assertIsObject($primerCarton);
        $this->assertIsObject($segundoCarton);
        $this->assertIsObject($tercerCarton);
    }

    /**
     *
     * @covers ::getNombre()
     */
    public function testLaFuncionGetnombreDevuelveElNombreCorrecto(){
        //given
        $sut = new Jugador("Ismael", 1, "foto1");
        $nombre = $sut->getNombre();

        //when
        $espero = "Ismael";
        
        //then
        $this->assertEquals($nombre, $espero);
    }
}