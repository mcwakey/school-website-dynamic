# Ghana Primary School Website - Theme Customization Guide

## Overview
The Ghana Primary School website uses a comprehensive theme system that allows for easy color customization throughout the entire site. The theme is built using CSS custom properties (variables) and can be modified at multiple levels.

## Current Color Scheme
- **Primary Color**: #E74C25 (School brand color - vibrant orange-red)
- **Secondary Color**: #2C5530 (Deep forest green - complementary)
- **Accent Color**: #F7931E (Bright orange - analogous)

## How to Change Theme Colors

### Method 1: CSS Variables (Recommended)
Edit the file `/public/css/theme.css` and modify the CSS custom properties:

```css
:root {
    --theme-primary: #E74C25;        /* Change this to your desired primary color */
    --theme-secondary: #2C5530;      /* Change this to your desired secondary color */
    --theme-accent: #F7931E;         /* Change this to your desired accent color */
}
```

### Method 2: Laravel Configuration
Edit the file `/config/theme.php` and modify the color values:

```php
'colors' => [
    'primary' => '#E74C25',      // Your primary color
    'secondary' => '#2C5530',    // Your secondary color
    'accent' => '#F7931E',       // Your accent color
],
```

### Method 3: Database Settings
Use the admin panel to modify theme colors directly in the database:
- Go to Admin → Settings
- Look for theme settings
- Update `theme_primary_color` and `theme_secondary_color`

## Pre-built Color Schemes

### Blue Theme
```css
--theme-primary: #2563eb;
--theme-secondary: #059669;
--theme-accent: #f59e0b;
```

### Purple Theme
```css
--theme-primary: #7c3aed;
--theme-secondary: #dc2626;
--theme-accent: #f59e0b;
```

### Green Theme
```css
--theme-primary: #059669;
--theme-secondary: #2563eb;
--theme-accent: #f59e0b;
```

## Color Usage Throughout the Site

### Primary Color Used For:
- Navigation active states
- Section titles and headings
- Primary buttons
- Hero section background (gradient)
- Feature box icons
- Footer background

### Secondary Color Used For:
- Top contact bar background
- Mission/Vision icons
- Secondary buttons
- Card hover effects

### Accent Color Used For:
- Call-to-action sections
- Accent buttons
- Icon highlights
- Gradient combinations

## Advanced Customization

### Adding New Color Variations
You can add your own color variations by extending the CSS variables:

```css
:root {
    --my-custom-color: #ff6b6b;
    --my-custom-light: #ffa8a8;
    --my-custom-dark: #e03131;
}
```

### Creating Custom Gradients
Define new gradient combinations:

```css
:root {
    --gradient-custom: linear-gradient(135deg, var(--my-custom-color), var(--theme-primary));
}
```

## Tips for Color Selection

1. **Use a Color Theory Tool**: Tools like Adobe Color or Coolors.co can help you find complementary colors
2. **Maintain Contrast**: Ensure text remains readable on colored backgrounds
3. **Test Accessibility**: Use tools like WebAIM's contrast checker
4. **Consider Brand Colors**: Use your school's official brand colors
5. **Test on Different Devices**: Colors may appear differently on various screens

## Files That Control Theme

- `/public/css/theme.css` - Main theme variables
- `/config/theme.php` - Laravel configuration
- `/resources/views/layouts/website.blade.php` - Main layout with CSS
- `/database/seeders/SettingsSeeder.php` - Default theme settings

## Troubleshooting

### Colors Not Updating?
1. Clear browser cache
2. Check if CSS file is properly linked
3. Ensure CSS variables are properly defined
4. Restart Laravel server if using dynamic settings

### Accessibility Issues?
1. Check color contrast ratios
2. Test with screen readers
3. Ensure focus states are visible
4. Validate with accessibility tools

## Support

For additional customization help, refer to:
- Bootstrap 5 documentation
- CSS custom properties guide
- Laravel configuration documentation
