<?php
if(!defined('_DOMAIN_')){
  define('_DOMAIN_', 'milega.benjar.net');
}

if(!defined('_TOKEN_ENCRYPTION_ALG_')){
  define('_TOKEN_ENCRYPTION_ALG_', 'aes-256-cbc');
}

if(!defined('_TOKEN_ENCRYPTION_KEY_')){
  define('_TOKEN_ENCRYPTION_KEY_', 'utUgQiEi9RfVC9QNVXt4qqNdUBdfNSt1LZd4GkjVU13m7Y4MrXOKIaNrNvsplu+fiokQuz3SOTBCJLdwTWkaTA==');
}

if(!defined('_TOKEN_ENCRYPTION_IV_')){
  define('_TOKEN_ENCRYPTION_IV_', 'k4ZBxyGeqAfyQWj1wbW2iQ==');
}

if(!defined('_LOCALIZATION_DEFAULT_')){
  define('_LOCALIZATION_DEFAULT_', 'swedish');
}

if(!defined('_AUTHENTICATION_TOKEN_LIFETIME_')){
  define('_AUTHENTICATION_TOKEN_LIFETIME_', 60 * 60 * 24 * 30);
}

if(!defined('_PDO_DATABASE_')){
  define('_PDO_DATABASE_', ['sqlite:db/milega.sqlite']);
}

if(!defined('_EMAIL_ACTIVATED_')){
  define('_EMAIL_ACTIVATED_', false);
}

if(!defined('_EMAIL_SMTP_HOST_')){
  define('_EMAIL_SMTP_HOST_', 'smtp.gmail.com');
}

if(!defined('_EMAIL_SMTP_PORT_')){
  define('_EMAIL_SMTP_PORT_', 465);
}

if(!defined('_EMAIL_SMTP_SECURITY_')){
  define('_EMAIL_SMTP_SECURITY_', 'ssl');
}

if(!defined('_EMAIL_SMTP_USERNAME_')){
  define('_EMAIL_SMTP_USERNAME_', '');
}

if(!defined('_EMAIL_SMTP_PASSWORD_')){
  define('_EMAIL_SMTP_PASSWORD_', '');
}
