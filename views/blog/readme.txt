NIFTY SOLUTIONS – BLOG POST CREATION GUIDE

This guide explains how to create, edit, or maintain blog posts on the Nifty Solutions website.
It is meant for anyone managing the blog — even if you have no prior context.

⸻

FOLDER LOCATION

All blog post files are stored in:
views/blog/

Each blog post is a separate .php file.
Example:
why-backups-matter.php
how-to-choose-an-antivirus.php

⸻

HOW THE SYSTEM WORKS
	•	Each blog post file contains important metadata inside its <head> section (like title, description, author, etc.).
	•	This metadata is automatically read by the website and displayed on:
	1.	The “All Blog Posts” listing page
	2.	The individual blog post page itself
	•	You do not need to manually add or register new posts anywhere else.

⸻

CREATING A NEW BLOG POST
	1.	Open the folder: views/blog/
	2.	Copy any existing blog post file (for example, why-backups-matter.php)
	3.	Rename it appropriately using lowercase letters and hyphens only
Example: importance-of-cybersecurity.php
	4.	Open the new file and edit the meta tags inside the <head> section
(update title, description, category, date, author info, etc.)
	5.	Replace the main content sections with your new article text and images
	6.	Save the file — that’s it!
The new blog post will automatically appear on the All Blog Posts page.

⸻

IMPORTANT META TAGS

Each post should have meta tags for the following:

title                 – Title of the post (shown on listing and page header)
description           – Short SEO-friendly summary
category              – Blog category (e.g., IT Solutions, Design, etc.)
thumbnail_url         – URL of the thumbnail image shown on the listing page
date                  – Date of publishing (DD-MM-YYYY format)
reading-time          – Approximate reading time (e.g., 5 Mins)

author                – Author’s name
author-photo-url      – URL of the author’s profile picture
author-designation    – Author’s job title
author-bio            – Short author bio shown at the bottom
author-linkedin       – LinkedIn profile URL
author-instagram      – Instagram profile URL (optional)
author-facebook        – Facebook profile URL (optional)
author-twitter         – Twitter profile URL (optional)

If any optional meta tag is missing, that section (like a social icon) will not appear on the page.

⸻

RULES AND CONVENTIONS
	1.	Always edit or add meta tags instead of hardcoding the same information inside the HTML body.
	2.	Use the DD-MM-YYYY format for dates. Posts are automatically sorted by date (newest first).
	3.	The filename automatically becomes the blog URL slug.
Example: why-backups-matter.php → /blog/why-backups-matter
	4.	Use clean, descriptive filenames (no spaces or special characters).
	5.	Make sure all image URLs (thumbnails, author photos, etc.) are publicly accessible.
	6.	Avoid inline styles; use existing Crafto CSS classes.
	7.	Keep the overall page layout and structure consistent with other posts.

⸻

DO NOT
	•	Do not remove PHP variables like $metadata[...] from the file.
	•	Do not manually edit or change controllers/blog.php unless necessary.
	•	Do not rename or move files without checking their routes.
	•	Do not delete the meta tags section — the system relies on it to function.

⸻

REFERENCE
	•	Example posts are available in the same folder (views/blog/).
Use them as a reference for structure, layout, and meta tags.
	•	Blog logic (how metadata is read and displayed) is in:
controllers/blog.php
	•	Blog listing layout is in:
views/all-blog-posts.php

⸻

TROUBLESHOOTING

If a blog post does not appear on the All Blog Posts page:
	•	Check if the filename ends with .php
	•	Ensure there are no syntax errors
	•	Verify that all key meta tags (especially title and date) are present

⸻

END OF FILE