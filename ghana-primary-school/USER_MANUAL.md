# 📚 Ghana Primary School Website - User Manual

**Version**: 1.0  
**Date**: June 30, 2025  
**For**: Website Administrators and Staff

---

## 📖 Table of Contents

1. [Getting Started](#getting-started)
2. [Admin Login & Dashboard](#admin-login--dashboard)
3. [Managing Website Content](#managing-website-content)
4. [Content Management Modules](#content-management-modules)
5. [Settings & Configuration](#settings--configuration)
6. [Public Website Overview](#public-website-overview)
7. [Best Practices & Tips](#best-practices--tips)
8. [Troubleshooting](#troubleshooting)
9. [Support & Maintenance](#support--maintenance)

---

## 🚀 Getting Started

### System Requirements
- Modern web browser (Chrome, Firefox, Safari, Edge)
- Internet connection
- Admin account credentials

### Default Admin Account
- **Email**: `admin@school.com`
- **Password**: `password123`
- **⚠️ Important**: Change the default password after first login!

### Accessing the Website
- **Public Website**: `https://your-school-domain.com`
- **Admin Portal**: `https://your-school-domain.com/admin`
- **Login Page**: `https://your-school-domain.com/login`

---

## 🔐 Admin Login & Dashboard

### Logging In
1. Navigate to the login page: `/login`
2. Enter your admin email and password
3. Click "Login"
4. You'll be redirected to the admin dashboard

### Dashboard Overview
The admin dashboard provides:
- **Quick Statistics**: Overview of content counts (news, events, gallery, staff)
- **Recent Activities**: Latest news articles and events
- **Quick Actions**: Buttons to quickly add new content
- **Navigation Sidebar**: Access to all admin functions

### Navigation Menu
- **Dashboard**: Main overview and statistics
- **News**: Manage news articles and announcements
- **Events**: Manage school events and activities
- **Gallery**: Manage photo galleries
- **Staff**: Manage staff profiles and information
- **Documents**: Manage downloadable files and resources
- **Hero Slides**: Manage homepage slideshow
- **Core Values**: Manage school values displayed on About page
- **Settings**: Manage school information and website settings
- **View Website**: Quick link to public website
- **Logout**: Sign out of admin portal

---

## 🛠️ Managing Website Content

### General Content Management Principles

#### Creating New Content
1. Click on the relevant section in the sidebar (e.g., "News")
2. Click the "Create New" or "Add New" button
3. Fill in all required fields (marked with *)
4. Upload images if applicable
5. Set publication status (draft/published)
6. Click "Save" or "Create"

#### Editing Existing Content
1. Navigate to the content section
2. Find the item you want to edit
3. Click the "Edit" button (pencil icon)
4. Make your changes
5. Click "Update" to save

#### Viewing Content
1. Navigate to the content section
2. Click the "View" button (eye icon) to see how it appears on the public website

#### Deleting Content
1. Navigate to the content section
2. Click the "Delete" button (trash icon)
3. Confirm the deletion in the popup
4. **⚠️ Warning**: This action cannot be undone!

---

## 📝 Content Management Modules

### 📰 News Management

#### Creating News Articles
1. Go to **Admin > News > Create New**
2. Fill in the following fields:
   - **Title**: Headline for the news article
   - **Slug**: URL-friendly version (auto-generated from title)
   - **Summary**: Brief description for previews
   - **Content**: Full article content (supports rich text)
   - **Featured Image**: Upload a high-quality image
   - **Status**: Choose "Published" to make it live, "Draft" to save for later
   - **Published At**: Set publication date and time

#### Best Practices for News
- Use clear, engaging headlines
- Include relevant images (recommended size: 1200x600px)
- Write compelling summaries for social media sharing
- Use proper grammar and school-appropriate language
- Publish time-sensitive news promptly

### 📅 Event Management

#### Creating Events
1. Go to **Admin > Events > Create New**
2. Fill in the following fields:
   - **Title**: Event name
   - **Slug**: URL-friendly version
   - **Description**: Detailed event information
   - **Start Date & Time**: When the event begins
   - **End Date & Time**: When the event ends
   - **Location**: Where the event takes place
   - **Featured Image**: Event poster or relevant image
   - **Status**: Published/Draft

#### Event Types
- **School Activities**: Sports days, cultural events, competitions
- **Academic Events**: Exams, graduation, academic conferences
- **Community Events**: Parent meetings, fundraisers, community service
- **Administrative**: School closures, important deadlines

### 📸 Gallery Management

#### Managing Photo Galleries
1. Go to **Admin > Gallery > Create New**
2. Fill in the details:
   - **Title**: Gallery name (e.g., "Sports Day 2025")
   - **Description**: Brief description of the event/occasion
   - **Category**: Choose appropriate category
   - **Images**: Upload multiple images (recommended size: 1200x800px)

#### Gallery Categories
- **Academic Activities**
- **Sports & Recreation**
- **Cultural Events**
- **School Infrastructure**
- **Community Events**

#### Image Guidelines
- Use high-quality images (minimum 800x600px)
- Ensure all people in photos have given consent
- Avoid blurry or poorly lit images
- Compress large files to improve website speed

### 👥 Staff Management

#### Adding Staff Members
1. Go to **Admin > Staff > Create New**
2. Complete the staff profile:
   - **Name**: Full name of staff member
   - **Position**: Job title (e.g., "Mathematics Teacher")
   - **Department**: Subject area or administrative department
   - **Bio**: Professional background and qualifications
   - **Photo**: Professional headshot (recommended size: 400x400px)
   - **Email**: Contact email (optional)
   - **Phone**: Contact number (optional)
   - **Status**: Active/Inactive

#### Staff Categories
- **Teaching Staff**: Subject teachers, class teachers
- **Administrative Staff**: Principal, vice-principal, office staff
- **Support Staff**: Librarian, counselor, nurse
- **Part-time/Visiting**: Guest lecturers, consultants

### 📁 Document Management

#### Uploading Documents
1. Go to **Admin > Documents > Create New**
2. Provide document details:
   - **Title**: Document name
   - **Description**: What the document contains
   - **Category**: Type of document
   - **File**: Upload PDF, DOC, or other file formats
   - **Public**: Choose if document should be publicly downloadable

#### Document Categories
- **Academic**: Curriculum guides, syllabi, academic calendars
- **Administrative**: Policies, forms, procedures
- **Student Resources**: Handbooks, guidelines, reading lists
- **Parent Information**: Fee structures, parent guides

### 🎠 Hero Slides Management

#### Managing Homepage Slideshow
1. Go to **Admin > Hero Slides > Create New**
2. Configure slide details:
   - **Title**: Main headline text
   - **Subtitle**: Supporting text
   - **Image**: High-quality background image (recommended size: 1920x800px)
   - **Button Text**: Call-to-action button label
   - **Button URL**: Link destination
   - **Order**: Display sequence (lower numbers show first)
   - **Status**: Active/Inactive

#### Slide Best Practices
- Use high-resolution images with good contrast
- Keep text concise and readable
- Ensure images represent school positively
- Limit to 3-5 active slides for optimal performance
- Test on mobile devices for responsiveness

### 💎 Core Values Management

#### Managing School Values
1. Go to **Admin > Core Values > Create New**
2. Define each value:
   - **Title**: Value name (e.g., "Excellence")
   - **Description**: Explanation of what this value means
   - **Icon**: Font Awesome icon class (e.g., "fas fa-star")
   - **Order**: Display sequence
   - **Status**: Active/Inactive

#### Value Examples
- **Excellence**: Striving for the highest standards
- **Integrity**: Honesty and moral principles
- **Respect**: Valuing diversity and treating others well
- **Innovation**: Embracing new ideas and creativity
- **Community**: Building strong relationships and partnerships

---

## ⚙️ Settings & Configuration

### School Information Settings
1. Go to **Admin > Settings**
2. Update the following information:
   - **School Name**: Official school name
   - **Logo**: Upload school logo (recommended size: 200x100px)
   - **Contact Information**: Address, phone, email
   - **Social Media**: Facebook, Twitter, Instagram links
   - **About Text**: School description for About page
   - **Mission Statement**: School's mission and vision

### SEO Settings
- **Meta Description**: Brief description for search engines
- **Keywords**: Relevant keywords for search optimization
- **Google Analytics**: Tracking code for website analytics

---

## 🌐 Public Website Overview

### Public Pages Available
1. **Homepage**: Hero slideshow, featured content, quick links
2. **About Us**: School history, mission, values, leadership
3. **Academic Programs**: Curriculum details, subjects offered
4. **News**: Latest announcements and school news
5. **Events**: Upcoming and past school events
6. **Gallery**: Photo galleries organized by category
7. **Staff**: Teacher and staff directory with profiles
8. **Contact**: Contact information, location map, contact form
9. **Documents**: Public downloadable resources

### Website Features
- **Responsive Design**: Works on all devices and screen sizes
- **Search Functionality**: Users can search all content
- **Social Media Integration**: Share content on social platforms
- **Contact Forms**: Visitors can send messages through website
- **SEO Optimized**: Good visibility in search engines

---

## 💡 Best Practices & Tips

### Content Creation
- **Regular Updates**: Post news and events regularly to keep website fresh
- **Quality Control**: Review all content for accuracy and appropriateness
- **Consistent Branding**: Use school colors and maintain professional tone
- **Image Optimization**: Compress images to ensure fast loading times
- **Mobile-First**: Always check how content looks on mobile devices

### SEO Best Practices
- Use descriptive, keyword-rich titles
- Write compelling meta descriptions
- Include alt text for all images
- Create content that answers common questions
- Use internal linking between related pages

### Security & Maintenance
- Change default passwords immediately
- Use strong, unique passwords
- Log out when finished using admin portal
- Regularly backup important content
- Keep contact information updated

### User Experience
- Ensure all links work correctly
- Test forms and interactive features
- Maintain consistent navigation
- Provide clear calls-to-action
- Make important information easy to find

---

## 🔧 Troubleshooting

### Common Issues & Solutions

#### Can't Log In
- Check username and password are correct
- Ensure caps lock is off
- Clear browser cache and cookies
- Try using a different browser
- Contact website administrator if issues persist

#### Images Not Uploading
- Check file size (maximum 10MB recommended)
- Ensure file format is supported (JPG, PNG, GIF)
- Check internet connection
- Try refreshing the page and uploading again

#### Content Not Appearing on Website
- Verify content status is set to "Published"
- Check publication date is not in the future
- Clear website cache if available
- Wait a few minutes for changes to appear

#### Slow Website Performance
- Optimize image sizes before uploading
- Limit number of active hero slides
- Remove unused or outdated content
- Contact hosting provider if issues persist

### Error Messages
- **403 Forbidden**: No permission to access - check admin status
- **404 Not Found**: Page doesn't exist - check URL spelling
- **500 Server Error**: Technical issue - contact administrator
- **Upload Failed**: File too large or wrong format

---

## 📞 Support & Maintenance

### Regular Maintenance Tasks
- **Weekly**: Review and publish new content
- **Monthly**: Check all links and forms work correctly
- **Quarterly**: Review and update school information
- **Annually**: Update staff profiles and contact information

### Getting Help
For technical support or questions about using the website:

1. **Check this manual** first for common solutions
2. **Contact the website administrator** for account issues
3. **Document any errors** you encounter with screenshots
4. **Provide specific details** about what you were trying to do

### Content Guidelines
- All content should be school-appropriate
- Ensure you have permission to publish photos of people
- Follow school policies for external communications
- Maintain professional tone and accurate information
- Respect privacy and confidentiality requirements

### Backup & Recovery
- Important content is automatically backed up
- Contact administrator for content recovery if needed
- Keep local copies of important documents and images
- Report any data loss immediately

---

## 📋 Quick Reference

### Admin Login
- URL: `/login`
- Default: `admin@school.com` / `password123`

### Content Status Options
- **Published**: Live on website
- **Draft**: Saved but not public
- **Inactive**: Hidden from public view

### Image Recommendations
- **Hero Slides**: 1920x800px
- **News/Events**: 1200x600px
- **Gallery**: 1200x800px
- **Staff Photos**: 400x400px
- **Logo**: 200x100px

### File Upload Limits
- **Images**: 10MB maximum
- **Documents**: 50MB maximum
- **Supported Formats**: JPG, PNG, GIF, PDF, DOC, DOCX

---

## 🎓 Conclusion

This manual covers all the essential features and functions of the Ghana Primary School website. The system is designed to be user-friendly while providing powerful content management capabilities.

Remember to:
- Keep content fresh and up-to-date
- Maintain professional standards
- Test changes before publishing
- Ask for help when needed

For additional support or advanced features, please contact your website administrator.

**Happy content managing!** 🚀

---

*Last Updated: June 30, 2025*  
*Version: 1.0*
