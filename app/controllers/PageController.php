<?php
class PageController {
    public function about() {
        require_once __DIR__ . '/../views/pages/about.php';
    }
    public function service() {
        require_once __DIR__ . '/../views/pages/service.php';
    }
}
