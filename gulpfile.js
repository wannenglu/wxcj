var gulp = require("gulp");	//引用gulp对象
var less = require("gulp-less");	//引用less对象

gulp.task("css",function(){	//在gulp中建立一个任务css
	var cssSrc = "src/less/*.less",	//建立一个变量cssSrc，引用生成环境的less地址
		cssDist = "dist/css";
	
	//将生成环境下的less文件编译后转存到发布环境下
	gulp.src(cssSrc).pipe(less()).pipe(gulp.dest(cssDist));
	//src(cssSrc)  gulp任务操作的源文件;
	//pipe(less())  执行less编译;
	//pipe(gulp.dest(cssDist))  gulp任务输出的新文件
});

gulp.task("dist",function(){
	gulp.src("src/*.*").pipe(gulp.dest("dist"));
	gulp.src("src/images/*.*").pipe(gulp.dest("dist/images"));
	gulp.src("src/js/*.*").pipe(gulp.dest("dist/js"));
});

gulp.task("watch",function(){	//监听css
	gulp.watch("src/less/*.less",["css","dist"]);
});