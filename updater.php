<?php 
session_start();
error_reporting(true);
/*
*	Update script for Quiz Online PHP Admin Panel from v5.1 to v5.2
*	All Right reserved to WRTeam.in
*	
*/
// sleep(5);
// include "convert-latin1-to-utf8.php";
if(!isset($_SESSION["count"]) && $_SESSION["count"]!="applied"){
	include('../includes/crud.php');
	$db = new Database();
	$db->connect();

	/* adding columns and altering fields in database table */
	$db->sql("ALTER TABLE `delivery_boys` ADD `fcm_id` VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `date_created`;");

	$db->sql("CREATE TABLE `delivery_boy_notifications` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `delivery_boy_id` INT(11) NOT NULL , `order_id` INT(11) NOT NULL , `title` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , `message` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , `type` VARCHAR(56) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`)) ENGINE = InnoDB;");



	$db->sql("ALTER TABLE `fund_transfers` ADD `type` VARCHAR(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'credit | debit' AFTER `delivery_boy_id`;");

	$db->sql("ALTER TABLE `seller` CHANGE `last_updated` `last_updated` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00';");

	$db->sql("ALTER TABLE `wallet_transactions` CHANGE `last_updated` `last_updated` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00';");

	
	copy('update-files/api-firebase/api-docs.txt', '../api-firebase/api-docs.txt');
	copy('update-files/api-firebase/create-razorpay-order.php', '../api-firebase/create-razorpay-order.php');
	copy('update-files/api-firebase/get-all-products.php', '../api-firebase/get-all-products.php');
	copy('update-files/api-firebase/get-areas-by-city-id.php', '../api-firebase/get-areas-by-city-id.php');
	copy('update-files/api-firebase/get-bootstrap-table-data.php', '../api-firebase/get-bootstrap-table-data.php');
	copy('update-files/api-firebase/get-categories.php', '../api-firebase/get-categories.php');
	copy('update-files/api-firebase/get-cities.php', '../api-firebase/get-cities.php');
	copy('update-files/api-firebase/get-product-by-id.php', '../api-firebase/get-product-by-id.php');
	copy('update-files/api-firebase/get-products-by-category-id.php', '../api-firebase/get-products-by-category-id.php');
	copy('update-files/api-firebase/get-products-by-subcategory-id.php', '../api-firebase/get-products-by-subcategory-id.php');
	copy('update-files/api-firebase/get-subcategories-by-category-id.php', '../api-firebase/get-subcategories-by-category-id.php');
	copy('update-files/api-firebase/get-user-data.php', '../api-firebase/get-user-data.php');
	copy('update-files/api-firebase/login.php', '../api-firebase/login.php');
	copy('update-files/api-firebase/offer-images.php', '../api-firebase/offer-images.php');
	copy('update-files/api-firebase/order-process.php', '../api-firebase/order-process.php');
	copy('update-files/api-firebase/payment-request.php', '../api-firebase/payment-request.php');
	copy('update-files/api-firebase/products-search.php', '../api-firebase/products-search.php');
	copy('update-files/api-firebase/register-device.php', '../api-firebase/register-device.php');
	copy('update-files/api-firebase/sections.php', '../api-firebase/sections.php');
	copy('update-files/api-firebase/send-email.php', '../api-firebase/send-email.php');
	copy('update-files/api-firebase/send-sms.php', '../api-firebase/send-sms.php');
	copy('update-files/api-firebase/settings.php', '../api-firebase/settings.php');
	copy('update-files/api-firebase/slider-images.php', '../api-firebase/slider-images.php');
	copy('update-files/api-firebase/user-registration.php', '../api-firebase/user-registration.php');
	copy('update-files/api-firebase/validate-promo-code.php', '../api-firebase/validate-promo-code.php');
	copy('update-files/api-firebase/verify-token.php', '../api-firebase/verify-token.php');

	copy('update-files/delivery-boy/db-operation.php', '../delivery-boy/db-operation.php');
	copy('update-files/delivery-boy/delete-order.php', '../delivery-boy/delete-order.php');
	copy('update-files/delivery-boy/delivery-boy-profile.php', '../delivery-boy/delivery-boy-profilephp');
	copy('update-files/delivery-boy/footer.php', '../delivery-boy/footer.php');
	copy('update-files/delivery-boy/fund-transfers.php', '../delivery-boy/fund-transfers.php');
	copy('update-files/delivery-boy/get-bootstrap-table-data.php', '../delivery-boy/get-bootstrap-table-data.php');
	copy('update-files/delivery-boy/header.php', '../delivery-boy/header.php');
	copy('update-files/delivery-boy/home.php', '../delivery-boy/home.php');
	copy('update-files/delivery-boy/index.php', '../delivery-boy/index.php');
	copy('update-files/delivery-boy/invoice.php', '../delivery-boy/invoice.php');
	copy('update-files/delivery-boy/login-form.php', '../delivery-boy/login-form.php');
	copy('update-files/delivery-boy/logout.php', '../delivery-boy/logout.php');
	copy('update-files/delivery-boy/order-detail.php', '../delivery-boy/order-detail.php');
	copy('update-files/delivery-boy/orders.php', '../delivery-boy/orders.php');

	copy('update-files/delivery-boy/api/api-v1-docs.txt', '../delivery-boy/api/api-v1-docs.txt');
	copy('update-files/delivery-boy/api/api-v1.php', '../delivery-boy/api/api-v1.php');
	copy('update-files/delivery-boy/api/verify-token.php', '../delivery-boy/api/verify-token.php');

	copy('update-files/delivery-boy/public/confirm-delete-order.php', '../delivery-boy/public/confirm-delete-order.php');
	copy('update-files/delivery-boy/public/fund-transfer-table.php', '../delivery-boy/public/fund-transfer-table.php');
	copy('update-files/delivery-boy/public/invoice-print.php', '../delivery-boy/public/invoice-print.php');
	copy('update-files/delivery-boy/public/orders-data.php', '../delivery-boy/public/orders-data.php');
	copy('update-files/delivery-boy/public/orders-table.php', '../delivery-boy/public/orders-table.php');


	copy('update-files/includes/custom-functions.php', '../includes/custom-functions.php');
	copy('update-files/includes/firebase.php', '../includes/firebase.php');
	copy('update-files/includes/functions.php', '../includes/functions.php');
	copy('update-files/includes/push.php', '../includes/push.php');

	copy('update-files/notification/firebase.php', '../notification/firebase.php');
	copy('update-files/notification/push.php', '../notification/push.php');


	copy('update-files/about-us.php', '../about-us.php');
	copy('update-files/add-area.php', '../add-area.php');
	copy('update-files/add-category.php', '../add-category.php');
	copy('update-files/add-city.php', '../add-city.php');
	copy('update-files/add-delivery-boy.php', '../add-delivery-boy.php');
	copy('update-files/add-image.php', '../add-image.php');
	copy('update-files/add-product.php', '../add-product.php');
	copy('update-files/add-subcategory.php', '../add-subcategory.php');
	copy('update-files/admin-profile.php', '../admin-profile.php');
	copy('update-files/api-docs.txt', '../api-docs.txt');
	copy('update-files/areas.php', '../areas.php');
	copy('update-files/categories.php', '../categories.php');
	copy('update-files/city.php', '../city.php');
	copy('update-files/contact-us.php', '../contact-us.php');
	copy('update-files/contact.php', '../contact.php');
	copy('update-files/customer-report.php', '../customer-report.php');
	copy('update-files/customers.php', '../customers.php');
	copy('update-files/delete-area.php', '../delete-area.php');
	copy('update-files/delete-category.php', '../delete-category.php');
	copy('update-files/delete-city.php', '../delete-city.php');
	copy('update-files/delete-order.php', '../delete-order.php');
	copy('update-files/delete-product.php', '../delete-product.php');
	copy('update-files/delete-query.php', '../delete-query.php');
	copy('update-files/delete-subcategory.php', '../delete-subcategory.php');
	copy('update-files/delieverycharge.php', '../delieverycharge.php');
	copy('update-files/delivery-boys.php', '../delivery-boys.php');
	copy('update-files/edit-area.php', '../edit-area.php');
	copy('update-files/edit-category.php', '../edit-category.php');
	copy('update-files/edit-city.php', '../edit-city.php');
	copy('update-files/edit-image.php', '../edit-image.php');
	copy('update-files/edit-product.php', '../edit-product.php');
	copy('update-files/edit-query.php', '../edit-query.php');
	copy('update-files/edit-subcategory.php', '../edit-subcategory.php');
	copy('update-files/email.php', '../email.php');
	copy('update-files/faq.php', '../faq.php');
	copy('update-files/footer.php', '../footer.php');
	copy('update-files/fund-transfers.php', '../fund-transfers.php');
	copy('update-files/header.php', '../header.php');
	copy('update-files/home.php', '../home.php');
	copy('update-files/index.php', '../index.php');
	copy('update-files/info.php', '../info.php');

	copy('update-files/invoice.php', '../invoice.php');
	copy('update-files/invoices.php', '../invoices.php');
	copy('update-files/loginusers.php', '../loginusers.php');
	copy('update-files/logout.php', '../logout.php');
	copy('update-files/main-slider.php', '../main-slider.php');
	copy('update-files/manage-customer-wallet.php', '../manage-customer-wallet.php');
	copy('update-files/new-offers.php', '../new-offers.php');
	copy('update-files/notification-settings.php', '../notification-settings.php');
	copy('update-files/notification.php', '../notification.php');
	copy('update-files/order-detail.php', '../order-detail.php');
	copy('update-files/orders.php', '../orders.php');
	copy('update-files/payment-methods-settings.php', '../payment-methods-settings.php');
	copy('update-files/payment-requests.php', '../Paypal-integration.txt');
	copy('update-files/Paypal-integration.txt', '../manage-customer-wallet.php');
	copy('update-files/play-store-privacy-policy.php', '../play-store-privacy-policy.php');
	copy('update-files/privacy-policy.php', '../privacy-policy.php');
	copy('update-files/product-detail.php', '../product-detail.php');
	copy('update-files/products-order.php', '../products-order.php');
	copy('update-files/products.php', '../products.php');
	copy('update-files/promo-code.php', '../promo-code.php');
	copy('update-files/return-requests.php', '../return-requests.php');
	copy('update-files/sales-report.php', '../sales-report.php');
	copy('update-files/sections.php', '../sections.php');
	copy('update-files/send-multiple-push.php', '../send-multiple-push.php');
	copy('update-files/settings.php', '../settings.php');
	copy('update-files/subcategories.php', '../subcategories.php');
	copy('update-files/system-users.php', '../system-users.php');
	copy('update-files/terms-conditions.php', '../terms-conditions.php');
	copy('update-files/time-slots.php', '../time-slots.php');
	copy('update-files/transaction.php', '../transaction.php');
	copy('update-files/view-category-product.php', '../view-category-product.php');
	copy('update-files/view-city-area.php', '../view-city-area.php');
	copy('update-files/view-product-variants.php', '../view-product-variants.php');
	copy('update-files/view-product.php', '../view-product.php');
	copy('update-files/view-subcategory-product.php', '../view-subcategory-product.php');
	copy('update-files/view-subcategory.php', '../view-subcategory.php');
	copy('update-files/wallet-transactions.php', '../wallet-transactions.php');

	copy('update-files/public/add-area-form.php', '../public/add-area-form.php');
	copy('update-files/public/add-category-form.php', '../public/add-category-form.php');
	copy('update-files/public/add-city-form.php', '../public/add-city-form.php');
	copy('update-files/public/add-image-form.php', '../public/add-image-form.php');
	copy('update-files/public/add-product-form.php', '../public/add-product-form.php');
	copy('update-files/public/add-subcategory-form.php', '../public/add-subcategory-form.php');
	copy('update-files/public/area-table.php', '../public/area-table.php');
	copy('update-files/public/category-table.php', '../public/category-table.php');
	copy('update-files/public/city-table.php', '../public/city-table.php');
	copy('update-files/public/confirm-delete-area.php', '../public/confirm-delete-area.php');
	copy('update-files/public/confirm-delete-category.php', '../public/confirm-delete-category.php');
	copy('update-files/public/confirm-delete-city.php', '../public/confirm-delete-city.php');
	copy('update-files/public/confirm-delete-login-user.php', '../public/confirm-delete-login-user.php');
	copy('update-files/public/confirm-delete-order.php', '../public/confirm-delete-order.php');
	copy('update-files/public/confirm-delete-product.php', '../public/confirm-delete-product.php');
	copy('update-files/public/confirm-delete-query.php', '../public/confirm-delete-query.php');
	copy('update-files/public/confirm-delete-subcategory.php', '../public/confirm-delete-subcategory.php');
	copy('update-files/public/customer-report-table.php', '../public/customer-report-table.php');
	copy('update-files/public/customers-table.php', '../public/customers-table.php');
	copy('update-files/public/db-operation.php', '../public/db-operation.php');
	copy('update-files/public/delete-other-images.php', '../public/delete-other-images.php');
	copy('update-files/public/delievery-charge-form.php', '../public/delievery-charge-form.php');
	copy('update-files/public/delivery-boy-table.php', '../public/delivery-boy-table.php');
	copy('update-files/public/edit-area-form.php', '../public/edit-area-form.php');
	copy('update-files/public/edit-category-form.php', '../public/edit-category-form.php');
	copy('update-files/public/edit-city-form.php', '../public/edit-city-form.php');
	copy('update-files/public/edit-image-form.php', '../public/edit-image-form.php');
	copy('update-files/public/edit-product-form.php', '../public/edit-product-form.php');
	copy('update-files/public/edit-query-form.php', '../public/edit-query-form.php');
	copy('update-files/public/edit-subcategory-form.php', '../public/edit-subcategory-form.php');
	copy('update-files/public/fund-transfer-table.php', '../public/fund-transfer-table.php');
	copy('update-files/public/invoice-print.php', '../public/invoice-print.php');
	copy('update-files/public/invoice-table.php', '../public/invoice-table.php');
	copy('update-files/public/login-form.php', '../public/login-form.php');
	copy('update-files/public/manage-customer-wallet-table.php', '../public/manage-customer-wallet-table');
	copy('update-files/publicorders-data.php', '../public/orders-data.php');
	copy('update-files/public/orders-table.php', '../public/orders-table.php');
	copy('update-files/public/payment-requests-table.php', '../public/payment-requests-table.php');
	copy('update-files/public/privacypolicy.php', '../public/privacypolicy.php');
	copy('update-files/public/product-data.php', '../public/product-data.php');
	copy('update-files/public/products-table.php', '../public/products-table.php');
	copy('update-files/public/promo-code-table.php', '../public/promo-code-table.php');
	copy('update-files/public/return-requests-table.php', '../public/return-requests-table.php');
	copy('update-files/public/sales-report-table.php', '../public/sales-report-table.php');
	copy('update-files/public/send-message.php', '../public/send-message.php');
	copy('update-files/public/setting-form.php', '../public/setting-form.php');
	copy('update-files/public/subcategory-table.php', '../public/subcategory-table.php');
	copy('update-files/public/system-users-form.php', '../public/system-users-form.php');
	copy('update-files/public/time-slots-table.php', '../public/time-slots-table.php');
	copy('update-files/public/transaction-table.php', '../public/transaction-table.php');
	copy('update-files/public/wallet-transactions-table.php', '../public/wallet-transactions-table.php');

	



	echo "Congratulations! You have successfully upgraded your system!<br/><h4>If you liked our Auto Update system</h4>";

	$_SESSION['count'] = "applied";
	// echo "Operation done successfully! Do not perform this second time! ";
}else{
	
	exit("Operation already applied! Cannot perform this second time! Please now delete the <b>/update</b> folder from your server directory");
}


?>