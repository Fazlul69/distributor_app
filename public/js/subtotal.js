/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/subtotal.js":
/*!**********************************!*\
  !*** ./resources/js/subtotal.js ***!
  \**********************************/
/***/ (() => {

eval("$(document).on(\"keyup change mouseup mousedown mouseout keydown\", \".quantity\", function () {\n  var sum = 0.00;\n  $(\".sale_total\").each(function () {\n    sum += +$(this).val();\n  });\n  $(\".sub_total\").val(sum);\n}); // discount\n\n$(document).on(\"change keyup blur\", \"#grand_discount\", function () {\n  var amd = $('#sub_total').val();\n  var disc = $('#grand_discount').val();\n\n  if (disc != '' && amd != '') {\n    $('#grand_total').val(parseFloat(amd) - parseFloat(amd) * (parseFloat(disc) / 100));\n  } else {\n    $('#grand_total').val(parseFloat(amd));\n  }\n}); //due\n\n$(document).on(\"change keyup blur\", \"#payed\", function () {\n  var amd = $('#grand_total').val();\n  var disc = $('#payed').val();\n\n  if (disc != '' && amd != '') {\n    $('#due').val(parseFloat(amd).toFixed(2) - parseFloat(disc).toFixed(2));\n  } else {\n    $('#due').val(parseFloat(amd).toFixed(2));\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJvbiIsInN1bSIsImVhY2giLCJ2YWwiLCJhbWQiLCJkaXNjIiwicGFyc2VGbG9hdCIsInRvRml4ZWQiXSwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL3N1YnRvdGFsLmpzPzBiOWEiXSwic291cmNlc0NvbnRlbnQiOlsiJChkb2N1bWVudCkub24oXCJrZXl1cCBjaGFuZ2UgbW91c2V1cCBtb3VzZWRvd24gbW91c2VvdXQga2V5ZG93blwiLCBcIi5xdWFudGl0eVwiLCBmdW5jdGlvbigpIHtcbiAgdmFyIHN1bSA9IDAuMDA7XG4gICQoXCIuc2FsZV90b3RhbFwiKS5lYWNoKGZ1bmN0aW9uKCl7XG4gICAgICBzdW0gKz0gKyQodGhpcykudmFsKCk7XG4gIH0pO1xuICAkKFwiLnN1Yl90b3RhbFwiKS52YWwoc3VtKTtcbn0pO1xuXG4vLyBkaXNjb3VudFxuJChkb2N1bWVudCkub24oXCJjaGFuZ2Uga2V5dXAgYmx1clwiLCBcIiNncmFuZF9kaXNjb3VudFwiLCBmdW5jdGlvbigpIHtcbiAgdmFyIGFtZCA9ICQoJyNzdWJfdG90YWwnKS52YWwoKTtcbiAgdmFyIGRpc2MgPSAkKCcjZ3JhbmRfZGlzY291bnQnKS52YWwoKTtcbiAgaWYgKGRpc2MgIT0gJycgJiYgYW1kICE9ICcnKSB7XG4gICAgJCgnI2dyYW5kX3RvdGFsJykudmFsKChwYXJzZUZsb2F0KGFtZCkgLSAoKHBhcnNlRmxvYXQoYW1kKSkgKiAoKHBhcnNlRmxvYXQoZGlzYykpLyAxMDApKSkpO1xuICB9ZWxzZXtcbiAgICAkKCcjZ3JhbmRfdG90YWwnKS52YWwocGFyc2VGbG9hdChhbWQpKTtcbiAgfVxufSk7XG5cbi8vZHVlXG4kKGRvY3VtZW50KS5vbihcImNoYW5nZSBrZXl1cCBibHVyXCIsIFwiI3BheWVkXCIsIGZ1bmN0aW9uKCkge1xuICB2YXIgYW1kID0gJCgnI2dyYW5kX3RvdGFsJykudmFsKCk7XG4gIHZhciBkaXNjID0gJCgnI3BheWVkJykudmFsKCk7XG4gIGlmIChkaXNjICE9ICcnICYmIGFtZCAhPSAnJykge1xuICAgICQoJyNkdWUnKS52YWwoKHBhcnNlRmxvYXQoYW1kKS50b0ZpeGVkKDIpKSAtIChwYXJzZUZsb2F0KGRpc2MpLnRvRml4ZWQoMikpKTtcbiAgfWVsc2V7XG4gICAgJCgnI2R1ZScpLnZhbChwYXJzZUZsb2F0KGFtZCkudG9GaXhlZCgyKSk7XG4gIH1cbn0pO1xuXG5cbiJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEVBQVosQ0FBZSxpREFBZixFQUFrRSxXQUFsRSxFQUErRSxZQUFXO0VBQ3hGLElBQUlDLEdBQUcsR0FBRyxJQUFWO0VBQ0FILENBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJJLElBQWpCLENBQXNCLFlBQVU7SUFDNUJELEdBQUcsSUFBSSxDQUFDSCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFLLEdBQVIsRUFBUjtFQUNILENBRkQ7RUFHQUwsQ0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQkssR0FBaEIsQ0FBb0JGLEdBQXBCO0FBQ0QsQ0FORCxFLENBUUE7O0FBQ0FILENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEVBQVosQ0FBZSxtQkFBZixFQUFvQyxpQkFBcEMsRUFBdUQsWUFBVztFQUNoRSxJQUFJSSxHQUFHLEdBQUdOLENBQUMsQ0FBQyxZQUFELENBQUQsQ0FBZ0JLLEdBQWhCLEVBQVY7RUFDQSxJQUFJRSxJQUFJLEdBQUdQLENBQUMsQ0FBQyxpQkFBRCxDQUFELENBQXFCSyxHQUFyQixFQUFYOztFQUNBLElBQUlFLElBQUksSUFBSSxFQUFSLElBQWNELEdBQUcsSUFBSSxFQUF6QixFQUE2QjtJQUMzQk4sQ0FBQyxDQUFDLGNBQUQsQ0FBRCxDQUFrQkssR0FBbEIsQ0FBdUJHLFVBQVUsQ0FBQ0YsR0FBRCxDQUFWLEdBQW9CRSxVQUFVLENBQUNGLEdBQUQsQ0FBWCxJQUFzQkUsVUFBVSxDQUFDRCxJQUFELENBQVgsR0FBb0IsR0FBekMsQ0FBMUM7RUFDRCxDQUZELE1BRUs7SUFDSFAsQ0FBQyxDQUFDLGNBQUQsQ0FBRCxDQUFrQkssR0FBbEIsQ0FBc0JHLFVBQVUsQ0FBQ0YsR0FBRCxDQUFoQztFQUNEO0FBQ0YsQ0FSRCxFLENBVUE7O0FBQ0FOLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEVBQVosQ0FBZSxtQkFBZixFQUFvQyxRQUFwQyxFQUE4QyxZQUFXO0VBQ3ZELElBQUlJLEdBQUcsR0FBR04sQ0FBQyxDQUFDLGNBQUQsQ0FBRCxDQUFrQkssR0FBbEIsRUFBVjtFQUNBLElBQUlFLElBQUksR0FBR1AsQ0FBQyxDQUFDLFFBQUQsQ0FBRCxDQUFZSyxHQUFaLEVBQVg7O0VBQ0EsSUFBSUUsSUFBSSxJQUFJLEVBQVIsSUFBY0QsR0FBRyxJQUFJLEVBQXpCLEVBQTZCO0lBQzNCTixDQUFDLENBQUMsTUFBRCxDQUFELENBQVVLLEdBQVYsQ0FBZUcsVUFBVSxDQUFDRixHQUFELENBQVYsQ0FBZ0JHLE9BQWhCLENBQXdCLENBQXhCLENBQUQsR0FBZ0NELFVBQVUsQ0FBQ0QsSUFBRCxDQUFWLENBQWlCRSxPQUFqQixDQUF5QixDQUF6QixDQUE5QztFQUNELENBRkQsTUFFSztJQUNIVCxDQUFDLENBQUMsTUFBRCxDQUFELENBQVVLLEdBQVYsQ0FBY0csVUFBVSxDQUFDRixHQUFELENBQVYsQ0FBZ0JHLE9BQWhCLENBQXdCLENBQXhCLENBQWQ7RUFDRDtBQUNGLENBUkQiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvc3VidG90YWwuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/subtotal.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/subtotal.js"]();
/******/ 	
/******/ })()
;