# 📦 Pincode Availability Checker – WordPress Gutenberg Block Plugin

**Pincode Availability Checker** is a lightweight, dynamic Gutenberg block plugin that allows site visitors to check if their pincode is serviceable (i.e., eligible for delivery) based on a list configured by the site admin.

Visitors can input their pincode, and the plugin will remember it for up to a month using cookies. On future visits, the block will automatically pre-fill and re-check the delivery status — improving UX and reducing friction.

---

## ✨ Features

- ✅ Gutenberg block to collect and check user pincode
- 🧠 Auto-prefills saved pincode from browser cookies
- 🕒 Cookie remembered for 30 days
- ⚙️ Admin interface to manage deliverable pincodes (one per line)
- 📦 Dynamic block using `render.php` (server-side rendering)

---

## 🛠 How It Works

1. Add the **Pincode Availability Checker block** to any post or page via the block editor.
2. Admins can configure the list of valid pincodes under:
   **Settings → Pincode Settings**
3. Users can:
   - Enter their pincode
   - Get instant feedback on delivery availability
   - Have their pincode saved in the browser for next time
4. On page load, if a cookie is present, the block auto-checks without user interaction.

---

## 🔧 Admin Setup

1. Navigate to **Settings → Pincode Settings**.
2. Enter one valid pincode **per line**.
3. Save changes.

---

## 📦 Block Styling

The block supports basic Gutenberg styling:

- Text and background colors
- Padding and margin spacing
- Typography (via block support)

All styles can be applied via the block sidebar.

---

## 🚀 Installation

1. Upload the plugin folder to `/wp-content/plugins/`
2. Activate the plugin via **Plugins → Installed Plugins**
3. Use the block editor to insert the **Pincode Checker** block.
4. Configure pincodes via **Settings → Pincode Settings**

---

## 📁 File Structure

```text
pincode-availability-checker/
├── build/                   → Compiled block assets (JS/CSS)
├── includes/
│   ├── api.php              → REST API endpoint for checking pincodes
│   ├── class-settings-page.php → Admin settings page
│   └── render.php           → Block rendering callback
├── src/                     → Source files (edit.js, index.js, etc.)
├── view.js              → Frontend logic (cookies, fetch, auto-check)
├── block.json               → Block registration metadata
├── pincode-availability-checker.php      → Main plugin file
└── readme.md