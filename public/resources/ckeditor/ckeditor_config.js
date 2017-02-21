/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	// 设置界面颜色
	// config.uiColor = '#AADC6E';
	// 允许的元素为所有元素，样式
	config.allowedContent = true;
	// 设置编辑器宽度
	config.width = '100%';
	// 设置编辑器高度
	config.height = '400px';
	// button
	config.extraPlugins = 'button';
	// toolbar
	config.extraPlugins = 'toolbar';
	// widgetselection
	config.extraPlugins = 'widgetselection';
	// lineutils;
	config.extraPlugins = 'lineutils';
	// notification;
	config.extraPlugins = 'notification';
	// 开启notificationaggregator
	config.extraPlugins = 'notificationaggregator';
	// 取消resize功能
	config.removePlugins = 'resize';
	// 开启widget;
	config.extraPlugins = 'widget';
	// 开启文件上传filetools
	config.extraPlugins = 'filetools';
	// 开启uploadwidget;
	config.extraPlugins = 'uploadwidget';
	// 启用uploadimage
	 config.extraPlugins = 'uploadimage';

	 config.uploadUrl = '/uploader/upload.php';
}
