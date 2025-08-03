Here’s a full README.md in the same clear, nicely formatted style:

markdown
Copy
Edit
# Vertex Education – WordPress Development & Maintenance + API & External Data Integration + Stakeholder & Content Support + Roadmapping 

> Version-controlled snapshot of a complete WordPress site, custom theme, plugin tweaks & JSON→HTML data table via WPGetAPI.

---

## 🗂️ Project Overview

This repo contains the entire WordPress codebase for **Vertex Education**, including:

- **Custom Theme**  
  Built from scratch under `/wp-content/themes/vertex-education-theme/`
- **Plugin Customizations**  
  - Code Snippets Pro (for our weather shortcode)  
  - WPGetAPI endpoint configuration  
  - WP Cerber, Elementor Pro, Complianz-GDPR, SEO extensions, etc.
- **External API Integration**  
  Fetch current weather from Weatherstack and render it as a styled HTML table via a `[weather_table]` shortcode.

---

## 🚀 Local Setup

1. **Clone** this repo into your XAMPP `htdocs` folder:
   ```bash
   cd /d/xampp/htdocs
   git clone https://github.com/devahmedaliashraf/Vertex-Education.git
   cd Vertex-Education
Import the SQL dump into a new MySQL database (e.g. vertexeducation).

Update wp-config.php with your local DB credentials.

Fix the URLs in the DB:

sql
Copy
Edit
UPDATE `wp_options`
  SET `option_value` = 'http://localhost/vertexeducation'
  WHERE `option_name` IN ('siteurl','home');
Start Apache & MySQL via XAMPP.

Browse to http://localhost/vertexeducation and log in.

📁 File Structure
pgsql
Copy
Edit
Vertex-Education/
├── wp-admin/
├── wp-content/
│   ├── themes/
│   │   └── vertex-education-theme/
│   │       ├── assets/
│   │       ├── inc/
│   │       ├── functions.php
│   │       └── style.css
│   └── plugins/
│       ├── code-snippets-pro/
│       ├── wpgetapi/
│       └── …
├── wp-includes/
├── .gitignore
├── ROADMAP.md
├── README.md
└── sql/  ← SQL dump for this site
🎨 Custom Theme Highlights
Mobile-first, responsive layout

Elementor hooks & custom widget areas

Tailwind-inspired SCSS for utility classes

Clean, semantic markup with ARIA landmarks

🔌 Plugin & API Integration
WPGetAPI Endpoint
Base URL: http://api.weatherstack.com/

Endpoint: /current?access_key={YOUR_KEY}&query={query}

Configured via WPGetAPI → External Data Integration in WP Admin.

Weather Shortcode
In Code Snippets Pro (snippet name: TEST), we inject CSS & register a [weather_table query="…"] shortcode:

php
Copy
Edit
/**
 * Inject our weather‐table styles.
 */
add_action( 'wp_head', function(){
  echo '<style>
    table.ws-weather-table { … }
    /* header rows, data cells, alternating backgrounds… */
  </style>';
});

/**
 * Shortcode: [weather_table query="…"]
 * Fetches current weather & renders a 2-col table.
 */
function test_weather_table_shortcode( $atts ) {
  $atts = shortcode_atts([ 'query'=>'' ], $atts, 'weather_table' );
  if ( empty($atts['query']) ) {
    return '<p>Please provide a location: <code>[weather_table query="New York"]</code></p>';
  }
  $raw  = wpgetapi_endpoint('API_External_Data_Integration','API_External_Data_Integration',['query'=>$atts['query']]);
  $data = json_decode($raw, true);
  if ( ! isset($data['location'],$data['current']) ) {
    return "<p>Unable to fetch weather for “{$atts['query']}”.</p>";
  }
  $sections = ['Location'=>$data['location'],'Current'=>$data['current']];
  $html = '<table class="ws-weather-table"><tbody>';
  foreach($sections as $label=>$section){
    $html .= "<tr style='background:#002a4e;'>
                <td colspan='2' style='color:#fff;font-weight:bold;'>{$label}</td>
              </tr>";
    foreach($section as $k=>$v){
      if(is_array($v)) $v = implode(', ',$v);
      $field = ucwords(str_replace('_',' ',$k));
      $html .= "<tr><td>{$field}</td><td>{$v}</td></tr>";
    }
  }
  $html .= '</tbody></table>';
  return $html;
}
add_shortcode('weather_table','test_weather_table_shortcode');
🛠️ Usage
Activate the WPGetAPI endpoint in WP Admin.

Enable the “Test” snippet in Code Snippets Pro.

Insert on any post/page:

html
Copy
Edit
[weather_table query="Glen Query"]
🤝 Contributing & Standards
Branching:
– main is always stable.
– New features in feature/… branches.

Commits:
– ✨ feat: … for features
– 🐛 fix: … for bugs
– ⚡️ perf: … for optimizations

Code Style: PSR-12 (PHP), Airbnb (JS), 2-space SCSS.

Last updated: August 3, 2025
Lead Dev: Ahmed Ali Ashraf

yaml
Copy
Edit

---

1. **Save** this as `README.md` at your repo root.  
2. **Commit & push**:

   ```bash
   git add README.md
   git commit -m "📖 Add detailed README"
   git push

