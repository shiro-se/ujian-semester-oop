<?php

/**
 * TUGAS (BONUS): Buat class View dengan template engine sederhana
 *
 * REQUIREMENTS:
 * 1. Method render($template, $data = []) - render view
 * 2. Support layout system (yield, section, extend)
 * 3. Support include partial view
 * 4. Escape HTML untuk keamanan XSS
 *
 * BONUS: Implementasikan caching untuk view yang sudah di-render
 */

namespace App\Core;

class View
{
    protected static $sections = [];
    protected static $sectionStack = [];
    protected static $layout = null;

    // TODO: Implementasikan class ini!

    /**
     * HINT:
     * - section('nama'): mulai buffering output
     * - endSection(): simpan buffered output ke $sections
     * - yield('nama'): echo $sections['nama']
     * - extends('layout'): set $layout, buffer output, lalu include layout
     */
}
