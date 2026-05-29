<?php

use App\Http\Middleware\RegisterPages;
use App\Http\Middleware\ShareViewData;
use Illuminate\Support\Facades\Route;

Route::middleware([RegisterPages::class, ShareViewData::class])
    ->group(function(){
        Route::livewire('', 'pages::home')->name('home')
            ->defaults('title', 'Home Page');
        Route::livewire('about', 'pages::about')->name('about')
            ->defaults('title', 'About Page');;
        Route::livewire('contact', 'pages::contact')->name('contact')
            ->defaults('title', 'Contact Page');
            
        Route::livewire('frequently-asked-questions', 'pages::faqs')->name('faqs');
        
        Route::prefix('publications')->group(function(){
            Route::livewire('{publicationType}', 'pages::publications')
                ->name('publications')
                ->defaults('title', 'Publications Page');;
        });
        
        Route::prefix('services')->group(function(){
            Route::livewire('', 'pages::services.index')->name('services')
                ->defaults('title', 'Services Page');;
            Route::prefix('{service}')->group(function(){
                Route::livewire('', 'pages::services.show')->name('services.show')
                    ->defaults('title', 'Service Details Page');;
            });
        });
            
        Route::prefix('careers')->group(function(){
            Route::livewire('', 'pages::careers.index')->name('careers')
                ->defaults('title', 'Careers Page');
            Route::prefix('{jobPosting}')->group(function(){
                Route::livewire('', 'pages::careers.show')->name('careers.show')
                    ->defaults('title', 'Career Details Page');
            });
        });

        Route::prefix('case-studies')->group(function(){
            Route::livewire('', 'pages::casestudy.index')->name('case-studies')
                ->defaults('title', 'Case Studies Page');
            Route::prefix('{caseStudy}')->group(function(){
                Route::livewire('', 'pages::casestudy.show')->name('case-studies.show')
                    ->defaults('title', 'Case Study Details Page');
            });
        });
        
        Route::prefix('team')->group(function(){
            Route::livewire('', 'pages::teams.index')->name('teams')
                ->defaults('title', 'Teams Page');;
            Route::prefix('{teamMember}')->group(function(){
                Route::livewire('', 'pages::teams.show')->name('teams.show')
                    ->defaults('title', 'Team Details Page');;
            });
        });

        Route::prefix('blog')->group(function(){
            Route::livewire('', 'pages::blog.index')->name('blog')
                ->defaults('title', 'Blog Posts Page');;
            Route::prefix('{post}')->group(function(){
                Route::livewire('', 'pages::blog.show')->name('blog.show')
                    ->defaults('title', 'Blog Post Details Page');;
            });
        });

        Route::prefix('events')->group(function(){
            Route::livewire('', 'pages::events.index')->name('events')
                ->defaults('title', 'Events Page');;
            Route::prefix('{event}')->group(function(){
                Route::livewire('', 'pages::events.show')->name('events.show')
                    ->defaults('title', 'Event Details Page');;
            });
        });
    });

