var gulp = require('gulp');
var browserSync = require('browser-sync').create();
//var spritesmith = require('gulp.spritesmith');
    
// 静态服务器
gulp.task('browser-sync', function() {
    browserSync.init({
        server: {
            baseDir: "./",
            index: "index2.html"
        },
        port: 8080
    });
    
    gulp.watch('css/*.css', ['css']);
    gulp.watch(['*.html', 'js/*.js', '*.js'])
        .on('change', browserSync.reload);
});

// 将CSS注入浏览器实现实时更新
gulp.task('css', function() {
    return gulp.src("css/*.css")
        .pipe(browserSync.reload({stream: true}));
});

//// 合并雪碧图
//gulp.task('sprite', function() {
//	return gulp.src('img/sprites/*.png')
//	           .pipe(spritesmith({
//	           	    imgName: 'img/sprite.png',
//	           	    cssName: 'css/sprite.css',
//	           	    padding: 5,
//	           	    algorithm: 'binary-tree'
//	           }))
//	           .pipe(gulp.dest('./'));
//});
   
gulp.task('default', ['browser-sync']);