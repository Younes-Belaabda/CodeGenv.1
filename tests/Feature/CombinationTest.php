<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Classes\HashCode;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CombinationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_ab_range(): void
    {
        $hashcode = new HashCode(2,'' , '' , ['a' , 'b']);
        $hashcode->generate();
        $this->assertEquals($hashcode->hashcodes , ['aa' , 'ab' , 'ba' , 'bb']);
    }
}
