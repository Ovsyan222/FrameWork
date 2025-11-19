<?php

    namespace MyProject\Controllers;

    class MainController
    {
        public function main()
        {
            echo 'Главаня страница';
        }

        public function sayHello(string $name)
        {
            echo 'Привет, ' .$name;
        }
    }