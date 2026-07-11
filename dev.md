# AGENTS.md

# Project Overview

Develop a corporate website based on CodeIgniter 4.

The reference website is:

https://huongvietsinh.com.vn/

The new website should NOT copy the original source code or assets.
Only use it as inspiration for:
- Layout
- UX
- Information architecture
- Section arrangement

The project must be built from scratch.

---

# Tech Stack

Framework:
- CodeIgniter 4 (latest stable)

PHP:
- PHP 8.2+

Database:
- MariaDB 10.6+

Frontend:
- Bootstrap 5.3
- Bootstrap Icons
- AOS Animation
- SwiperJS
- Fancybox

Javascript:
- Vanilla JS
- No jQuery unless absolutely necessary.

Template Engine:
- CI4 View

Environment:
- Apache
- Linux Hosting
- Shared Hosting Compatible

---

# Project Goal

Build a modern corporate website with Admin CMS.

Focus on:

- Speed
- SEO
- Easy content management
- Responsive
- Clean architecture

---

# Coding Standards

Follow PSR-12.

Always use:

Controllers
Models
Services
Libraries
Helpers

Avoid putting business logic inside Views.

Business logic belongs in Services.

Database logic belongs in Models.

Never duplicate code.

Always use reusable components.

---

# Folder Structure

/app

Controllers
Admin
Home.php
News.php
Contact.php
About.php
Service.php

Models

Services

Libraries

Helpers

Views

layouts
components
home
about
news
contact
service

/public

uploads

news

images

documents

---

# UI Requirements

Design style:

Modern
Clean
Corporate
Blue + White

Rounded corners

Soft shadow

Responsive

Sticky Header

Mega Footer

Animation should be subtle.

---

# Pages

Home

About

Services

Certificates

Projects / Gallery

News

Recruitment

Contact

Search

404

Privacy

Terms

---

# Home Page Sections

Hero Banner

Company Introduction

Why Choose Us

Statistics

Services

Production Process

Certificates

Gallery

Partners

Testimonials

Latest News

Contact CTA

Google Map

Footer

---

# Admin CMS

Dashboard

Banner Management

About Management

Service Management

News Management

Gallery Management

Certificate Management

Partner Management

Menu Management

Contact Messages

Users

Role Permission

SEO

Settings

File Manager

---

# Database Rules

Every table must contain

id

created_at

updated_at

deleted_at

created_by

updated_by

Use Soft Delete.

Use Timestamp.

---

# Upload Rules

Support:

jpg

png

webp

pdf

Maximum upload size:

20MB

Generate thumbnail automatically.

Store original image.

---

# SEO

Every page must support

SEO Title

Meta Description

Keywords

OG Image

Canonical URL

Slug

Schema.org JSON-LD

Generate sitemap.xml

Generate robots.txt

---

# Performance

Lazy Load Images

WebP Preferred

Cache HTML

Cache Query

Minify CSS

Minify JS

Compress Images

---

# Security

Use CSRF

Use XSS Filter

Validate all inputs

Escape output

Password Hash

Role Permission

Rate Limit Login

Never trust client input.

---

# Contact Form

Fields

Name

Phone

Email

Subject

Message

Google reCAPTCHA

Save database

Send Email

---

# News Module

Categories

Tags

Related News

Featured News

Search

SEO URL

Publish Schedule

Draft

---

# Gallery

Album

Image

Video

Filter

Lightbox

---

# Certificate Module

Title

Description

Image

Issue Date

Organization

PDF Attachment

---

# Banner

Desktop Image

Mobile Image

Title

Subtitle

Button

Order

Status

---

# Components

Navbar

Footer

Breadcrumb

Sidebar

Pagination

Card

Modal

Alert

Toast

Loading

---

# API

Prepare REST API for

News

Gallery

Contact

Service

Future Mobile App

---

# Coding Rules

Use Dependency Injection.

Keep Controller thin.

Move business logic into Service.

Keep View simple.

Never hardcode URL.

Always use route().

Always use base_url().

Never duplicate HTML.

Use partial Views.

---

# Documentation

Every Service

Every Model

Every Controller

must contain PHPDoc.

Complex logic should contain comments.

---

# Git Convention

feature/

bugfix/

hotfix/

release/

Use meaningful commit messages.

---

# Agent Behavior

Before implementing:

1. Analyze requirement.

2. Create implementation plan.

3. Break task into modules.

4. Ask for confirmation only if requirement is ambiguous.

5. Implement module by module.

6. Keep code reusable.

7. Avoid overengineering.

8. Prioritize readability.

9. Follow CodeIgniter 4 Best Practices.

10. Every generated code must be production-ready.

---

# UI Reference

Reference only:

https://huongvietsinh.com.vn/

Do NOT clone.

Do NOT copy images.

Do NOT copy text.

Create original implementation with similar layout and UX.

---

# Future Features

Multi Language

Google Analytics

Google Tag Manager

Facebook Pixel

Zalo OA

Newsletter

Chat Widget

CRM Integration

ERP Integration

SMS API

Email Marketing
