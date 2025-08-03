# Vertex Education WordPress Project

> A full, version-controlled WordPress site with a custom theme, plugin tweaks, performance optimizations, and an external Weatherstack API integration.

---

## Table of Contents

1. [Overview](#overview)  
2. [Prerequisites](#prerequisites)  
3. [Local Setup](#local-setup)  
   1. [Clone Repository](#1-clone-repository)  
   2. [Copy Files into `htdocs`](#2-copy-files-into-htdocs)  
   3. [Create Database & Import Dump](#3-create-database--import-dump)  
   4. [Update `wp-config.php`](#4-update-wp-configphp)  
   5. [Fix Site URLs](#5-fix-site-urls)  
4. [Custom Theme](#custom-theme)  
5. [Plugin Customizations](#plugin-customizations)  
   - [Weather Shortcode Snippet](#weather-shortcode-snippet)  
6. [API Integration (Weatherstack)](#api-integration-weatherstack)  
7. [Usage](#usage)  
8. [Git Workflow](#git-workflow)  
9. [Performance & Accessibility](#performance--accessibility)  
10. [Author](#author)  

---

## Overview

This repo contains a complete WordPress install customized for Vertex Education, including:

- Core WP files (`wp-admin/`, `wp-content/`, `wp-includes/`)  
- A **custom theme** scaffold  
- **Plugins**: Elementor, Code Snippets Pro, WPGetAPI, etc.  
- **Weather API** integration via WPGetAPI + a custom shortcode  

---

## Prerequisites

- **XAMPP** (or equivalent Apache + MySQL + PHP)  
- Git  
- A free [Weatherstack](https://weatherstack.com/) API key  

---

## Local Setup

### 1. Clone Repository

```bash
cd /d/xampp/htdocs
git clone https://github.com/devahmedaliashraf/Vertex-Education.git
cd Vertex-Education

2. Copy Files into htdocs
All WordPress core + custom code lives here already—no extra copy needed.

3. Create Database & Import Dump
In phpMyAdmin, create a new DB called vertexeducation.

Import sqldump.sql (410+ queries).

4. Update wp-config.php
In wp-config.php, set your local DB credentials:

php
Copy
Edit
define('DB_NAME',     'vertexeducation');
define('DB_USER',     'root');
define('DB_PASSWORD', '');
define('DB_HOST',     'localhost');

5. Fix Site URLs
Run this SQL in phpMyAdmin → vertexeducation.*_options:

sql
Copy
Edit
UPDATE `wp_options`
SET `option_value` = 'http://localhost/Vertex-Education'
WHERE `option_name` IN ('siteurl','home');
Custom Theme
We built a brand-new custom theme under wp-content/themes/vertex-education-theme/.
Features:

functions.php registers menus, thumbnails, Elementor locations

Clean, responsive templates in header.php, footer.php, index.php, etc.

Plugin Customizations
Weather Shortcode Snippet
We use Code Snippets Pro to inject our own shortcode:

php
Copy
Edit
/**
 * Inject styles for our weather table.
 */
add_action('wp_head', function(){
  echo '<style>
    table.ws-weather-table { … }
    table.ws-weather-table td { color:#003866; }
    /* …other rules… */
  </style>';
});

/**
 * Shortcode [weather_table query="…"]
 */
function test_weather_table_shortcode($atts){
  $atts = shortcode_atts(['query'=>''], $atts,'weather_table');
  if(!$atts['query']){
    return '<p>Please provide a location: <code>[weather_table query="New York"]</code></p>';
  }
  $raw  = wpgetapi_endpoint('API_External_Data_Integration','API_External_Data_Integration',['query'=>$atts['query']]);
  $data = json_decode($raw,true);
  if(!isset($data['location'],$data['current'])){
    return "<p>Unable to fetch {$atts['query']}.</p>";
  }
  $sections = ['Location'=>$data['location'],'Current'=>$data['current']];
  $html = '<table class="ws-weather-table"><tbody>';
  foreach($sections as $label=>$sec){
    $html .= "<tr style='background:#002a4e;'><td colspan='2' style='color:#fff'>$label</td></tr>";
    foreach($sec as $k=>$v){
      if(is_array($v)) $v = implode(', ',$v);
      $field = ucwords(str_replace('_',' ',$k));
      $html  .= "<tr><td>$field</td><td>$v</td></tr>";
    }
  }
  $html .= '</tbody></table>';
  return $html;
}
add_shortcode('weather_table','test_weather_table_shortcode');
API Integration (Weatherstack)
Base URL: http://api.weatherstack.com/

Endpoint: /current?access_key={YOUR_KEY}&query={LOCATION}

Configured via WPGetAPI plugin with:

API ID: API_External_Data_Integration

Endpoint ID: API_External_Data_Integration

Query params: access_key, query

Usage
Activate WPGetAPI & Code Snippets Pro.

Paste the weather snippet (above) into a new snippet, enable it.

In any post or page, insert:

text
Copy
Edit
[weather_table query="Glen Query"]
You’ll see a two-column weather table for that location.

Git Workflow
Branching

main always reflects live/trusted state.

Create feature branches for new work.

Commits

Write clear messages:

sql
Copy
Edit
git add .
git commit -m "🔧 Import full WP site & set up local dev"
Push & PR

bash
Copy
Edit
git push -u origin main
Performance & Accessibility
Lighthouse scores:

Performance: 97

Accessibility: 93

Best Practices: 100

SEO: 85

Ongoing optimizations: caching, minification, image compression, WCAG compliance.

Author
Ahmed Ali Ashraf
Lead WordPress Developer & Performance Optimization Specialist
LinkedIn • GitHub

Last updated: 2025-08-03
