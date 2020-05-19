# Seller API Client for PHP

It's an initial PHP project to connect to Blibli Seller API. 
Please feel free to relay your comments, suggestions or corrections through pull request.

### Setup

1. Download / clone the initial project.
2. Unzip it (if you download it instead of clone).
3. Put on PHP server directory, for example on htdocs folder for Apache.

### Sample Codes

<hr>

##### OAuth Flow

> Load index.php and it will work like the below sequence:

1. Send token request to `https://api-uata.gdn-app.com/v2/oauth/token`
2. Send refresh token request with `[1]` response to `https://api-uata.gdn-app.com/v2/oauth/token`
3. Send order detail request with access token from `[2]` to `https://api-uata.gdn-app.com/v2/proxy/mta/api/businesspartner/v1/order/orderDetail`
4. Send fulfill order request with access token from `[2]` to `https://api-uata.gdn-app.com/v2/proxy/mta/api/businesspartner/v1/order/fulfillRegular`

##### Basic Auth Flow

> Load index-basic-auth.php and it will work like the below sequence:

1. Send order detail request to `https://api-uata.gdn-app.com/v2/proxy/mta/api/businesspartner/v1/order/orderDetail`
2. Send fulfill order request with package id from `[1]` to `https://api-uata.gdn-app.com/v2/proxy/seller/v1/orders/regular/{packageId}/fulfill`