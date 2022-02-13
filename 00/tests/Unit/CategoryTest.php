<?php

namespace Tests\Unit;

use App\Models\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $model = new Category();
        $data = $model->getCategory();
        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        foreach($data as $id => $item) {
            $this->assertIsInt($id);
            $this->assertIsArray($item);
            $this->assertNotEmpty($item);
            $this->assertIsString($item['title']);
        }
    }
}
