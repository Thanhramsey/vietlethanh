<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Frontend Routes
$routes->get('lang/(:segment)', 'Language::switch/$1');
$routes->get('/', 'Home::index');
$routes->get('gioi-thieu', 'About::index');
$routes->get('dich-vu', 'Service::index');
$routes->get('dich-vu/(:segment)', 'Service::show/$1');
$routes->get('thu-vien', 'Gallery::index');
$routes->get('tin-tuc', 'News::index');
$routes->get('tin-tuc/danh-muc/(:segment)', 'News::category/$1');
$routes->get('tin-tuc/(:segment)', 'News::show/$1');
$routes->get('giay-to', 'Document::index');
$routes->get('giay-to/loai/(:segment)', 'Document::index/$1');
$routes->get('lien-he', 'Contact::index');
$routes->post('lien-he/gui', 'Contact::submit');

// Admin Auth Routes
$routes->get('admin', 'Admin\Dashboard::index'); // Redirect or dashboard
$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/login', 'Admin\Auth::attemptLogin');
$routes->get('admin/logout', 'Admin\Auth::logout');

// Admin Panel Routes
$routes->group('admin', function($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    
    // Contact Messages
    $routes->get('contacts', 'Admin\Contact::index');
    $routes->get('contacts/view/(:num)', 'Admin\Contact::view/$1');
    $routes->get('contacts/delete/(:num)', 'Admin\Contact::delete/$1');
    
    // Settings
    $routes->get('settings', 'Admin\Setting::index');
    $routes->post('settings/save', 'Admin\Setting::save');
    $routes->post('settings/partners/store', 'Admin\Setting::storePartner');
    $routes->post('settings/partners/update/(:num)', 'Admin\Setting::updatePartner/$1');
    $routes->post('settings/partners/toggle/(:num)', 'Admin\Setting::togglePartner/$1');
    $routes->get('settings/partners/delete/(:num)', 'Admin\Setting::deletePartner/$1');
    
    // Banners CRUD
    $routes->get('banners', 'Admin\Banner::index');
    $routes->get('banners/create', 'Admin\Banner::create');
    $routes->post('banners/store', 'Admin\Banner::store');
    $routes->get('banners/edit/(:num)', 'Admin\Banner::edit/$1');
    $routes->post('banners/update/(:num)', 'Admin\Banner::update/$1');
    $routes->get('banners/delete/(:num)', 'Admin\Banner::delete/$1');
    
    // Services CRUD
    $routes->get('services', 'Admin\Service::index');
    $routes->get('services/create', 'Admin\Service::create');
    $routes->post('services/store', 'Admin\Service::store');
    $routes->get('services/edit/(:num)', 'Admin\Service::edit/$1');
    $routes->post('services/update/(:num)', 'Admin\Service::update/$1');
    $routes->get('services/delete/(:num)', 'Admin\Service::delete/$1');
    
    // News CRUD
    $routes->get('news', 'Admin\News::index');
    $routes->get('news/create', 'Admin\News::create');
    $routes->post('news/store', 'Admin\News::store');
    $routes->get('news/edit/(:num)', 'Admin\News::edit/$1');
    $routes->post('news/update/(:num)', 'Admin\News::update/$1');
    $routes->get('news/delete/(:num)', 'Admin\News::delete/$1');
    
    // Gallery CRUD
    $routes->get('gallery', 'Admin\Gallery::index');
    $routes->get('gallery/create', 'Admin\Gallery::create');
    $routes->post('gallery/store', 'Admin\Gallery::store');
    $routes->get('gallery/edit/(:num)', 'Admin\Gallery::edit/$1');
    $routes->post('gallery/update/(:num)', 'Admin\Gallery::update/$1');
    $routes->get('gallery/delete/(:num)', 'Admin\Gallery::delete/$1');

    // User CRUD (Superadmin only)
    $routes->get('users', 'Admin\User::index');
    $routes->get('users/create', 'Admin\User::create');
    $routes->post('users/store', 'Admin\User::store');
    $routes->get('users/edit/(:num)', 'Admin\User::edit/$1');
    $routes->post('users/update/(:num)', 'Admin\User::update/$1');
    $routes->get('users/delete/(:num)', 'Admin\User::delete/$1');

    // News Categories CRUD
    $routes->get('news-categories', 'Admin\NewsCategory::index');
    $routes->get('news-categories/create', 'Admin\NewsCategory::create');
    $routes->post('news-categories/store', 'Admin\NewsCategory::store');
    $routes->get('news-categories/edit/(:num)', 'Admin\NewsCategory::edit/$1');
    $routes->post('news-categories/update/(:num)', 'Admin\NewsCategory::update/$1');
    $routes->get('news-categories/delete/(:num)', 'Admin\NewsCategory::delete/$1');

    // Document Categories CRUD
    $routes->get('document-categories', 'Admin\DocumentCategory::index');
    $routes->get('document-categories/create', 'Admin\DocumentCategory::create');
    $routes->post('document-categories/store', 'Admin\DocumentCategory::store');
    $routes->get('document-categories/edit/(:num)', 'Admin\DocumentCategory::edit/$1');
    $routes->post('document-categories/update/(:num)', 'Admin\DocumentCategory::update/$1');
    $routes->get('document-categories/delete/(:num)', 'Admin\DocumentCategory::delete/$1');

    // Documents CRUD
    $routes->get('documents', 'Admin\Document::index');
    $routes->get('documents/create', 'Admin\Document::create');
    $routes->post('documents/store', 'Admin\Document::store');
    $routes->get('documents/edit/(:num)', 'Admin\Document::edit/$1');
    $routes->post('documents/update/(:num)', 'Admin\Document::update/$1');
    $routes->get('documents/delete/(:num)', 'Admin\Document::delete/$1');

    // Gallery Albums CRUD
    $routes->get('gallery-albums', 'Admin\GalleryAlbum::index');
    $routes->get('gallery-albums/create', 'Admin\GalleryAlbum::create');
    $routes->post('gallery-albums/store', 'Admin\GalleryAlbum::store');
    $routes->get('gallery-albums/edit/(:num)', 'Admin\GalleryAlbum::edit/$1');
    $routes->post('gallery-albums/update/(:num)', 'Admin\GalleryAlbum::update/$1');
    $routes->get('gallery-albums/delete/(:num)', 'Admin\GalleryAlbum::delete/$1');

    // About Page Configuration
    $routes->get('about', 'Admin\About::index');
    $routes->post('about/save', 'Admin\About::save');

    // Company Milestones (Timeline) CRUD
    $routes->get('milestones', 'Admin\Milestone::index');
    $routes->get('milestones/create', 'Admin\Milestone::create');
    $routes->post('milestones/store', 'Admin\Milestone::store');
    $routes->get('milestones/edit/(:num)', 'Admin\Milestone::edit/$1');
    $routes->post('milestones/update/(:num)', 'Admin\Milestone::update/$1');
    $routes->get('milestones/delete/(:num)', 'Admin\Milestone::delete/$1');
});
