-- USERS
CREATE TABLE users (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NULL, -- NULL if Google login
  google_id VARCHAR(255) NULL,     -- for Google OAuth
  role ENUM('creator','business','admin') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- CREATOR PROFILE
CREATE TABLE creator_profiles (
  user_id BIGINT PRIMARY KEY,
  bio TEXT,
  platforms TEXT,
  followers INT,
  sample_links TEXT,
  avatar_url VARCHAR(255),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- BUSINESS PROFILE
CREATE TABLE business_profiles (
  user_id BIGINT PRIMARY KEY,
  company_name VARCHAR(255),
  website VARCHAR(255),
  contact_phone VARCHAR(50),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- CAMPAIGNS
CREATE TABLE campaigns (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  business_id BIGINT NOT NULL,
  title VARCHAR(255),
  description TEXT,
  budget DECIMAL(12,2),
  status ENUM('open','funded','in_progress','completed','cancelled') DEFAULT 'open',
  starts_at DATE NULL,
  ends_at DATE NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (business_id) REFERENCES users(id)
);

-- APPLICATIONS
CREATE TABLE applications (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  campaign_id BIGINT NOT NULL,
  creator_id BIGINT NOT NULL,
  pitch TEXT,
  status ENUM('applied','accepted','rejected','completed') DEFAULT 'applied',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (campaign_id) REFERENCES campaigns(id) ON DELETE CASCADE,
  FOREIGN KEY (creator_id) REFERENCES users(id) ON DELETE CASCADE
);

-- TRANSACTIONS (ESCROW)
CREATE TABLE transactions (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  campaign_id BIGINT,
  user_id BIGINT,
  provider ENUM('stripe','paypal','mpesa'),
  provider_txn_id VARCHAR(255),
  amount DECIMAL(12,2),
  type ENUM('fund','payout','refund'),
  status ENUM('pending','succeeded','failed') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (campaign_id) REFERENCES campaigns(id)
);

-- PAYOUTS
CREATE TABLE payouts (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  application_id BIGINT,
  creator_id BIGINT,
  amount DECIMAL(12,2),
  commission_amount DECIMAL(12,2),
  status ENUM('queued','processing','sent','failed') DEFAULT 'queued',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (application_id) REFERENCES applications(id),
  FOREIGN KEY (creator_id) REFERENCES users(id)
);

-- AUDIT LOGS
CREATE TABLE audit_logs (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  user_id BIGINT,
  action VARCHAR(255),
  object_type VARCHAR(100),
  object_id BIGINT,
  data JSON,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
