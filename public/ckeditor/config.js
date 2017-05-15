/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

    
    // //Show these image/flash browsing feature only to Admins
    // config.filebrowserBrowseUrl = '/kcfinder-3.12/browse.php?opener=ckeditor&type=files';
    // config.filebrowserImageBrowseUrl = '/kcfinder-3.12/browse.php?opener=ckeditor&type=images';
    // config.filebrowserFlashBrowseUrl = '/kcfinder-3.12/browse.php?opener=ckeditor&type=flash';
    

    /* Image/Flash upload feauture using kcfinder tool */
    config.filebrowserUploadUrl = '/kcfinder-3.12/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = '/kcfinder-3.12/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = '/kcfinder-3.12/upload.php?opener=ckeditor&type=flash';
};
