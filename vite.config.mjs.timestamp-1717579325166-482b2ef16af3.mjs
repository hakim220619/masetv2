// vite.config.mjs
import { defineConfig } from "file:///D:/data/project/lpp/maset/node_modules/vite/dist/node/index.js";
import laravel from "file:///D:/data/project/lpp/maset/node_modules/laravel-vite-plugin/dist/index.js";
import html from "file:///D:/data/project/lpp/maset/node_modules/@rollup/plugin-html/dist/es/index.js";
import { glob } from "file:///D:/data/project/lpp/maset/node_modules/glob/dist/esm/index.js";
function GetFilesArray(query) {
  return glob.sync(query);
}
var pageJsFiles = GetFilesArray("resources/assets/js/*.js");
var vendorJsFiles = GetFilesArray("resources/assets/vendor/js/*.js");
var LibsJsFiles = GetFilesArray("resources/assets/vendor/libs/**/*.js");
var CoreScssFiles = GetFilesArray("resources/assets/vendor/scss/**/!(_)*.scss");
var LibsScssFiles = GetFilesArray("resources/assets/vendor/libs/**/!(_)*.scss");
var LibsCssFiles = GetFilesArray("resources/assets/vendor/libs/**/*.css");
var FontsScssFiles = GetFilesArray("resources/assets/vendor/fonts/!(_)*.scss");
function libsWindowAssignment() {
  return {
    name: "libsWindowAssignment",
    transform(src, id) {
      if (id.includes("jkanban.js")) {
        return src.replace("this.jKanban", "window.jKanban");
      } else if (id.includes("vfs_fonts")) {
        return src.replaceAll("this.pdfMake", "window.pdfMake");
      }
    }
  };
}
var vite_config_default = defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/css/app.css",
        "resources/assets/css/demo.css",
        "resources/js/app.js",
        ...pageJsFiles,
        ...vendorJsFiles,
        ...LibsJsFiles,
        "resources/js/laravel-user-management.js",
        // Processing Laravel User Management CRUD JS File
        ...CoreScssFiles,
        ...LibsScssFiles,
        ...LibsCssFiles,
        ...FontsScssFiles
      ],
      refresh: true
    }),
    html(),
    libsWindowAssignment()
  ]
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcubWpzIl0sCiAgInNvdXJjZXNDb250ZW50IjogWyJjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfZGlybmFtZSA9IFwiRDpcXFxcZGF0YVxcXFxwcm9qZWN0XFxcXGxwcFxcXFxtYXNldFwiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9maWxlbmFtZSA9IFwiRDpcXFxcZGF0YVxcXFxwcm9qZWN0XFxcXGxwcFxcXFxtYXNldFxcXFx2aXRlLmNvbmZpZy5tanNcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfaW1wb3J0X21ldGFfdXJsID0gXCJmaWxlOi8vL0Q6L2RhdGEvcHJvamVjdC9scHAvbWFzZXQvdml0ZS5jb25maWcubWpzXCI7aW1wb3J0IHsgZGVmaW5lQ29uZmlnIH0gZnJvbSAndml0ZSc7XG5pbXBvcnQgbGFyYXZlbCBmcm9tICdsYXJhdmVsLXZpdGUtcGx1Z2luJztcbmltcG9ydCBodG1sIGZyb20gJ0Byb2xsdXAvcGx1Z2luLWh0bWwnO1xuaW1wb3J0IHsgZ2xvYiB9IGZyb20gJ2dsb2InO1xuXG4vKipcbiAqIEdldCBGaWxlcyBmcm9tIGEgZGlyZWN0b3J5XG4gKiBAcGFyYW0ge3N0cmluZ30gcXVlcnlcbiAqIEByZXR1cm5zIGFycmF5XG4gKi9cbmZ1bmN0aW9uIEdldEZpbGVzQXJyYXkocXVlcnkpIHtcbiAgcmV0dXJuIGdsb2Iuc3luYyhxdWVyeSk7XG59XG4vKipcbiAqIEpzIEZpbGVzXG4gKi9cbi8vIFBhZ2UgSlMgRmlsZXNcbmNvbnN0IHBhZ2VKc0ZpbGVzID0gR2V0RmlsZXNBcnJheSgncmVzb3VyY2VzL2Fzc2V0cy9qcy8qLmpzJyk7XG5cbi8vIFByb2Nlc3NpbmcgVmVuZG9yIEpTIEZpbGVzXG5jb25zdCB2ZW5kb3JKc0ZpbGVzID0gR2V0RmlsZXNBcnJheSgncmVzb3VyY2VzL2Fzc2V0cy92ZW5kb3IvanMvKi5qcycpO1xuXG4vLyBQcm9jZXNzaW5nIExpYnMgSlMgRmlsZXNcbmNvbnN0IExpYnNKc0ZpbGVzID0gR2V0RmlsZXNBcnJheSgncmVzb3VyY2VzL2Fzc2V0cy92ZW5kb3IvbGlicy8qKi8qLmpzJyk7XG5cbi8qKlxuICogU2NzcyBGaWxlc1xuICovXG4vLyBQcm9jZXNzaW5nIENvcmUsIFRoZW1lcyAmIFBhZ2VzIFNjc3MgRmlsZXNcbmNvbnN0IENvcmVTY3NzRmlsZXMgPSBHZXRGaWxlc0FycmF5KCdyZXNvdXJjZXMvYXNzZXRzL3ZlbmRvci9zY3NzLyoqLyEoXykqLnNjc3MnKTtcblxuLy8gUHJvY2Vzc2luZyBMaWJzIFNjc3MgJiBDc3MgRmlsZXNcbmNvbnN0IExpYnNTY3NzRmlsZXMgPSBHZXRGaWxlc0FycmF5KCdyZXNvdXJjZXMvYXNzZXRzL3ZlbmRvci9saWJzLyoqLyEoXykqLnNjc3MnKTtcbmNvbnN0IExpYnNDc3NGaWxlcyA9IEdldEZpbGVzQXJyYXkoJ3Jlc291cmNlcy9hc3NldHMvdmVuZG9yL2xpYnMvKiovKi5jc3MnKTtcblxuLy8gUHJvY2Vzc2luZyBGb250cyBTY3NzIEZpbGVzXG5jb25zdCBGb250c1Njc3NGaWxlcyA9IEdldEZpbGVzQXJyYXkoJ3Jlc291cmNlcy9hc3NldHMvdmVuZG9yL2ZvbnRzLyEoXykqLnNjc3MnKTtcblxuLy8gUHJvY2Vzc2luZyBXaW5kb3cgQXNzaWdubWVudCBmb3IgTGlicyBsaWtlIGpLYW5iYW4sIHBkZk1ha2VcbmZ1bmN0aW9uIGxpYnNXaW5kb3dBc3NpZ25tZW50KCkge1xuICByZXR1cm4ge1xuICAgIG5hbWU6ICdsaWJzV2luZG93QXNzaWdubWVudCcsXG5cbiAgICB0cmFuc2Zvcm0oc3JjLCBpZCkge1xuICAgICAgaWYgKGlkLmluY2x1ZGVzKCdqa2FuYmFuLmpzJykpIHtcbiAgICAgICAgcmV0dXJuIHNyYy5yZXBsYWNlKCd0aGlzLmpLYW5iYW4nLCAnd2luZG93LmpLYW5iYW4nKTtcbiAgICAgIH0gZWxzZSBpZiAoaWQuaW5jbHVkZXMoJ3Zmc19mb250cycpKSB7XG4gICAgICAgIHJldHVybiBzcmMucmVwbGFjZUFsbCgndGhpcy5wZGZNYWtlJywgJ3dpbmRvdy5wZGZNYWtlJyk7XG4gICAgICB9XG4gICAgfVxuICB9O1xufVxuXG5leHBvcnQgZGVmYXVsdCBkZWZpbmVDb25maWcoe1xuICBwbHVnaW5zOiBbXG4gICAgbGFyYXZlbCh7XG4gICAgICBpbnB1dDogW1xuICAgICAgICAncmVzb3VyY2VzL2Nzcy9hcHAuY3NzJyxcbiAgICAgICAgJ3Jlc291cmNlcy9hc3NldHMvY3NzL2RlbW8uY3NzJyxcbiAgICAgICAgJ3Jlc291cmNlcy9qcy9hcHAuanMnLFxuICAgICAgICAuLi5wYWdlSnNGaWxlcyxcbiAgICAgICAgLi4udmVuZG9ySnNGaWxlcyxcbiAgICAgICAgLi4uTGlic0pzRmlsZXMsXG4gICAgICAgICdyZXNvdXJjZXMvanMvbGFyYXZlbC11c2VyLW1hbmFnZW1lbnQuanMnLCAvLyBQcm9jZXNzaW5nIExhcmF2ZWwgVXNlciBNYW5hZ2VtZW50IENSVUQgSlMgRmlsZVxuICAgICAgICAuLi5Db3JlU2Nzc0ZpbGVzLFxuICAgICAgICAuLi5MaWJzU2Nzc0ZpbGVzLFxuICAgICAgICAuLi5MaWJzQ3NzRmlsZXMsXG4gICAgICAgIC4uLkZvbnRzU2Nzc0ZpbGVzXG4gICAgICBdLFxuICAgICAgcmVmcmVzaDogdHJ1ZVxuICAgIH0pLFxuICAgIGh0bWwoKSxcbiAgICBsaWJzV2luZG93QXNzaWdubWVudCgpXG4gIF1cbn0pO1xuIl0sCiAgIm1hcHBpbmdzIjogIjtBQUF5USxTQUFTLG9CQUFvQjtBQUN0UyxPQUFPLGFBQWE7QUFDcEIsT0FBTyxVQUFVO0FBQ2pCLFNBQVMsWUFBWTtBQU9yQixTQUFTLGNBQWMsT0FBTztBQUM1QixTQUFPLEtBQUssS0FBSyxLQUFLO0FBQ3hCO0FBS0EsSUFBTSxjQUFjLGNBQWMsMEJBQTBCO0FBRzVELElBQU0sZ0JBQWdCLGNBQWMsaUNBQWlDO0FBR3JFLElBQU0sY0FBYyxjQUFjLHNDQUFzQztBQU14RSxJQUFNLGdCQUFnQixjQUFjLDRDQUE0QztBQUdoRixJQUFNLGdCQUFnQixjQUFjLDRDQUE0QztBQUNoRixJQUFNLGVBQWUsY0FBYyx1Q0FBdUM7QUFHMUUsSUFBTSxpQkFBaUIsY0FBYywwQ0FBMEM7QUFHL0UsU0FBUyx1QkFBdUI7QUFDOUIsU0FBTztBQUFBLElBQ0wsTUFBTTtBQUFBLElBRU4sVUFBVSxLQUFLLElBQUk7QUFDakIsVUFBSSxHQUFHLFNBQVMsWUFBWSxHQUFHO0FBQzdCLGVBQU8sSUFBSSxRQUFRLGdCQUFnQixnQkFBZ0I7QUFBQSxNQUNyRCxXQUFXLEdBQUcsU0FBUyxXQUFXLEdBQUc7QUFDbkMsZUFBTyxJQUFJLFdBQVcsZ0JBQWdCLGdCQUFnQjtBQUFBLE1BQ3hEO0FBQUEsSUFDRjtBQUFBLEVBQ0Y7QUFDRjtBQUVBLElBQU8sc0JBQVEsYUFBYTtBQUFBLEVBQzFCLFNBQVM7QUFBQSxJQUNQLFFBQVE7QUFBQSxNQUNOLE9BQU87QUFBQSxRQUNMO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBLEdBQUc7QUFBQSxRQUNILEdBQUc7QUFBQSxRQUNILEdBQUc7QUFBQSxRQUNIO0FBQUE7QUFBQSxRQUNBLEdBQUc7QUFBQSxRQUNILEdBQUc7QUFBQSxRQUNILEdBQUc7QUFBQSxRQUNILEdBQUc7QUFBQSxNQUNMO0FBQUEsTUFDQSxTQUFTO0FBQUEsSUFDWCxDQUFDO0FBQUEsSUFDRCxLQUFLO0FBQUEsSUFDTCxxQkFBcUI7QUFBQSxFQUN2QjtBQUNGLENBQUM7IiwKICAibmFtZXMiOiBbXQp9Cg==
