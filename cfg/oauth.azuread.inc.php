<?php
//
// filesource oauth.azuread.inc.php
//
// Azure AD 
// Fill in CLIENT_ID,
//         CLIENT_SECRET,
//         YOURTESTLINKSERVER,
//         TENANTID 
// with your information
// See this article for registering an application: https://docs.microsoft.com/en-us/azure/active-directory/develop/v1-protocols-oauth-code
// Make sure, you grant admint consent for it: https://docs.microsoft.com/en-us/azure/active-directory/manage-apps/configure-user-consent

// 
// IMPORTANTE NOTICE
// key in $tlCfg->OAuthServers[]
// can be anything you want that make this configuration
// does not overwrite other or will be overwritten
//
// HOW TO use this file ?
// just add the following line to your custom_config.inc.php
//
// require('aouth.azuread.inc.php');
//
$tlCfg->OAuthServers['azuread']['oauth_enabled'] = true;
$tlCfg->OAuthServers['azuread']['oauth_name'] = 'azuread'; //do not change this

$tlCfg->OAuthServers['azuread']['oauth_client_id'] = 'CLIENT_ID';
$tlCfg->OAuthServers['azuread']['oauth_client_secret'] = 'CLIENT_SECRET';
$tlCfg->OAuthServers['azuread']['redirect_uri'] = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . '/login.php';

$tlCfg->OAuthServers['azuread']['oauth_force_single'] = true; 
$tlCfg->OAuthServers['azuread']['oauth_grant_type'] = 'authorization_code';  
$tlCfg->OAuthServers['azuread']['oauth_url'] = 
  'https://login.microsoftonline.com/TENANTID/oauth2/authorize';
$tlCfg->OAuthServers['azuread']['token_url'] = 'https://login.microsoftonline.com/TENANTID/oauth2/token';
// the domain you want to whitelist (email domains)
$tlCfg->OAuthServers['azuread']['oauth_domain'] = 'autsoft.hu'; 
$tlCfg->OAuthServers['azuread']['oauth_profile'] = 'https://login.microsoftonline.com/TENANTID/openid/userinfo';
$tlCfg->OAuthServers['azuread']['oauth_scope'] = 'https://graph.microsoft.com/mail.read https://graph.microsoft.com/user.read openid profile email';
