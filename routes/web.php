<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'laravel-filemanager','middleware' => 'checkuser'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });



 Route::get('/', 'ThemeController@index');
 Route::get('blog','ThemeController@blog');
 Route::get('category/{slug}','ThemeController@category');
 Route::get('blog/{slug}','ThemeController@post');
 Route::post('post/comment','ThemeController@comment_post');
 Route::get('analytic','ThemeController@visitor_update');
 Route::post('cv/download','ThemeController@cv_download');
 Route::post('mail','MailController@MainSentContactus');

//login
Route::get('/admin','LoginController@login');
Route::post('/admin','LoginController@login');

Route::group(['middleware' => 'checkuser'],function(){
    Route::prefix('admin')->group(function() {
        Route::get('dashboard','AnalyticsController@index');

            Route::get('logout','LoginController@logout');

            //education 
            Route::get('education','EducationController@index');
            Route::get('education/add','EducationController@add');
            Route::post('education/add','EducationController@add');
            Route::get('education/edit/{id}','EducationController@edit');
            Route::post('education/edit/{id}','EducationController@edit');
            Route::get('education/delete/{id}','EducationController@delete');


            //experience
            Route::get('experience','ExperienceController@index');
            Route::get('experience/add','ExperienceController@add');
            Route::post('experience/add','ExperienceController@add');
            Route::get('experience/edit/{id}','ExperienceController@edit');
            Route::post('experience/edit/{id}','ExperienceController@edit');
            Route::get('experience/delete/{id}','ExperienceController@delete');

            //skillscategory
            Route::get('skillscategory','SkillsCategoryController@index');
            Route::get('skillscategory/add','SkillsCategoryController@add');
            Route::post('skillscategory/add','SkillsCategoryController@add');
            Route::get('skillscategory/edit/{id}','SkillsCategoryController@edit');
            Route::post('skillscategory/edit/{id}','SkillsCategoryController@edit');
            Route::get('skillscategory/delete/{id}','SkillsCategoryController@delete');
            Route::get('skillscategory/order','SkillsCategoryController@order');
                


            //skill
            Route::get('skills','SkillsController@index');
            Route::get('skills/add','SkillsController@add');
            Route::post('skills/add','SkillsController@add');
            Route::get('skills/edit/{id}','SkillsController@edit');
            Route::post('skills/edit/{id}','SkillsController@edit');
            Route::get('skills/delete/{id}','SkillsController@delete');


            //about
            Route::get('about','AboutmeController@update');
            Route::post('about','AboutmeController@update');


            //certificate
            Route::get('certificate','CertificateController@index');
            Route::get('certificate/add','CertificateController@add');
            Route::post('certificate/add','CertificateController@add');
            Route::get('certificate/edit/{id}','CertificateController@edit');
            Route::post('certificate/edit/{id}','CertificateController@edit');
            Route::get('certificate/delete/{id}','CertificateController@delete');

            //personal info
            Route::get('personal','PersonalController@index');
            Route::post('personal','PersonalController@index');
            Route::get('personal/delete/{id}','PersonalController@delete');

            //blog
            Route::get('blog','BlogController@index');
            Route::get('blog/add','BlogController@add');
            Route::post('blog/add','BlogController@add');
            Route::get('blog/edit/{id}','BlogController@edit');
            Route::post('blog/edit/{id}','BlogController@edit');
            Route::get('blog/delete/{id}','BlogController@delete');

            //blog category
            Route::get('blog/category','BlogCategoryController@index');
            Route::post('blog/category/add','BlogCategoryController@add');
            Route::post('blog/category/edit/{id}','BlogCategoryController@update');
            Route::get('blog/category/remove/{id}','BlogCategoryController@remove');

            //Portfolio Category
            
             Route::get('portfolio/category','PortfolioCategoryController@index');
             Route::post('portfolio/category/add','PortfolioCategoryController@add');
             Route::post('portfolio/category/edit/{id}','PortfolioCategoryController@update');
             Route::get('portfolio/category/remove/{id}','PortfolioCategoryController@remove');

           //Portfolio
             Route::get('portfolio','PortfolioController@index');
             Route::get('portfolio/add','PortfolioController@add');
             Route::post('portfolio/add','PortfolioController@add');
             Route::get('portfolio/edit/{id}','PortfolioController@edit');
             Route::post('portfolio/edit/{id}','PortfolioController@edit');
             Route::get('portfolio/delete/{id}','PortfolioController@delete');


            //setting
            Route::get('setting','SettingController@index');
            Route::post('password/update','SettingController@update_passwword');
            Route::post('profile/update','SettingController@update_profile');

            //theme
            Route::get('theme','ThemeSettingController@index');
            Route::post('theme/update','ThemeSettingController@update_theme');
            Route::post('theme/update/page','ThemeSettingController@update_theme_page');
            Route::post('theme/update/image','ThemeSettingController@upload_image');
            Route::post('theme/update/video','ThemeSettingController@upload_video');
            Route::get('theme/update','ThemeSettingController@update');
            Route::post('theme/update/redirect','ThemeSettingController@redirect');
            
            
             //theme asset
            Route::post('image/active/{id}','ThemeSettingController@image_active');
            Route::post('video/active/{id}','ThemeSettingController@video_active');
            Route::get('themeasset/remove/{id}','ThemeSettingController@themeasset_remove');

            //comment
            Route::get('comment','CommentController@index');
            Route::get('comment/{postid}','CommentController@filter_by_post');
            Route::get('comment/view/{id}','CommentController@view_post');
            Route::post('comment/replay/{id}','CommentController@replay');
            Route::get('comment/delete/{id}','CommentController@delete');
            Route::post('clearall','CommentController@clear_all');

            //analytics
            Route::get('analytic','AnalyticsController@index');
            
            //seo
            Route::get('seo','SeoController@index');
            Route::post('seo/seoupdate','SeoController@seo');
            Route::post('seo/ogupdate','SeoController@og');
            Route::post('seo/googleanalytics','SeoController@google_analytics');
            Route::post('seo/tags','SeoController@tags');
            
            //resolution
            Route::post('resolution','ThemeSettingController@resolution');
            
            //corping image
            Route::post('crop-image', 'PersonalController@imageCrop');



    });
});