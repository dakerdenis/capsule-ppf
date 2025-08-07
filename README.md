# 🛡️ Capsule PPF — Digital Paint Protection Platform

🔗 [Visit Live Site](https://capsuleppf.com/)  

**Capsule PPF** is a full-featured Laravel-based web application for managing digital product verification, warranty certificate generation (PDF), and service authentication for automotive paint protection films.

The platform ensures product authenticity, streamlines service center workflows, and empowers both administrators and partners with secure tools to protect vehicle aesthetics and brand integrity.

---

## ✨ Key Features

- 🔐 **Digital Product Verification**  
  Secure QR scanning and unique code validation for every product.

- 📲 **SMS Confirmation System**  
  Sends confirmation and warranty activation messages via SMS.

- 📄 **PDF Warranty Generator**  
  Instantly generates branded warranty documents for customers.

- 🧑‍💼 **Admin Panel**  
  - Manage product batches (create, verify, revoke)
  - Control access for service centers
  - Track warranty issuances
  - View product and service verification stats

- 🛠️ **Service Center Portal**  
  - Each partner (car service center) gets a unique login
  - Only verified services can install and issue warranties
  - After purchasing a product, a timer is started during which a warranty **must be issued**
  - If time expires — SMS with warranty is not sent to customer (protection against misuse)

- 🧬 **Anti-counterfeit System: Dual Digital Shield**  
  1. **Verification Check**: via QR + code
  2. **Digital Warranty Certificate**: bound to the phone number via SMS confirmation

- 🚗 **Warranty Check by Vehicle Plate Number**  
  - Customers can validate warranty via license plate on the website

- 🌍 **Multi-language Support**  
  English / Russian

---

## ⚙️ Tech Stack

| Layer             | Technology                      |
|------------------|----------------------------------|
| **Backend**       | Laravel (PHP)                    |
| **Frontend**      | HTML, JavaScript, Tailwind CSS   |
| **Database**      | MySQL                            |
| **PDF Generator** | DomPDF                           |
| **SMS API**       | Integrated 3rd-party services    |
| **Authentication**| Role-based (Admin / Service)     |
| **Extras**        | Artisan CLI, Middleware, .env config |

---

## 📸 Screenshots

### 🧑‍💼 Admin Dashboard
![Admin Panel](assets/screenshots/admin-dashboard.png)

### 📄 Warranty Generation Form
![Warranty Form](assets/screenshots/warranty-form.png)

### 📱 Warranty by the car number
![Mobile Verification](assets/screenshots/car_number.png)

### Box with protection film with QR code and unic product number for verification
![Product Box](assets/screenshots/box.png)
---

