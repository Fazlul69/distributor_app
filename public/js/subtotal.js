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

eval("$(document).on(\"keyup change mouseup mousedown mouseout keydown\", \".quantity\", function () {\n  var sum = 0.00;\n  $(\".sale_total\").each(function () {\n    sum += +$(this).val();\n  });\n  $(\".sub_total\").val(sum);\n  $('#grand_total').val(sum);\n}); // discount\n\n$(document).on(\"change keyup blur\", \"#grand_discount\", function () {\n  var amd = $('#sub_total').val();\n  var disc = $('#grand_discount').val();\n\n  if (disc != '' && amd != '') {\n    $('#grand_total').val(parseFloat(amd).toFixed(2) - parseFloat(amd).toFixed(2) * (parseFloat(disc).toFixed(2) / 100));\n  } else {\n    $('#grand_total').val(parseFloat(amd).toFixed(2));\n  }\n}); //due\n\n$(document).on(\"change keyup blur\", \"#payed\", function () {\n  var amd = $('#grand_total').val();\n  var disc = $('#payed').val();\n\n  if (disc != '' && amd != '') {\n    $('#due').val(parseFloat(amd).toFixed(2) - parseFloat(disc).toFixed(2)).toFixed(2);\n  } else {\n    $('#due').val(parseFloat(amd).toFixed(2));\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvc3VidG90YWwuanMuanMiLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJvbiIsInN1bSIsImVhY2giLCJ2YWwiLCJhbWQiLCJkaXNjIiwicGFyc2VGbG9hdCIsInRvRml4ZWQiXSwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy9zdWJ0b3RhbC5qcz8wYjlhIl0sInNvdXJjZXNDb250ZW50IjpbIiQoZG9jdW1lbnQpLm9uKFwia2V5dXAgY2hhbmdlIG1vdXNldXAgbW91c2Vkb3duIG1vdXNlb3V0IGtleWRvd25cIiwgXCIucXVhbnRpdHlcIiwgZnVuY3Rpb24oKSB7XG4gIHZhciBzdW0gPSAwLjAwO1xuICAkKFwiLnNhbGVfdG90YWxcIikuZWFjaChmdW5jdGlvbigpe1xuICAgICAgc3VtICs9ICskKHRoaXMpLnZhbCgpO1xuICB9KTtcbiAgJChcIi5zdWJfdG90YWxcIikudmFsKHN1bSk7XG4gICQoJyNncmFuZF90b3RhbCcpLnZhbChzdW0pO1xufSk7XG5cbi8vIGRpc2NvdW50XG4kKGRvY3VtZW50KS5vbihcImNoYW5nZSBrZXl1cCBibHVyXCIsIFwiI2dyYW5kX2Rpc2NvdW50XCIsIGZ1bmN0aW9uKCkge1xuICB2YXIgYW1kID0gJCgnI3N1Yl90b3RhbCcpLnZhbCgpO1xuICB2YXIgZGlzYyA9ICQoJyNncmFuZF9kaXNjb3VudCcpLnZhbCgpO1xuICBpZiAoZGlzYyAhPSAnJyAmJiBhbWQgIT0gJycpIHtcbiAgICAkKCcjZ3JhbmRfdG90YWwnKS52YWwoKHBhcnNlRmxvYXQoYW1kKS50b0ZpeGVkKDIpIC0gKChwYXJzZUZsb2F0KGFtZCkudG9GaXhlZCgyKSkgKiAoKHBhcnNlRmxvYXQoZGlzYykudG9GaXhlZCgyKSkvIDEwMCkpKSk7XG4gIH1lbHNle1xuICAgICQoJyNncmFuZF90b3RhbCcpLnZhbChwYXJzZUZsb2F0KGFtZCkudG9GaXhlZCgyKSk7XG4gIH1cbn0pO1xuXG4vL2R1ZVxuJChkb2N1bWVudCkub24oXCJjaGFuZ2Uga2V5dXAgYmx1clwiLCBcIiNwYXllZFwiLCBmdW5jdGlvbigpIHtcbiAgdmFyIGFtZCA9ICQoJyNncmFuZF90b3RhbCcpLnZhbCgpO1xuICB2YXIgZGlzYyA9ICQoJyNwYXllZCcpLnZhbCgpO1xuICBpZiAoZGlzYyAhPSAnJyAmJiBhbWQgIT0gJycpIHtcbiAgICAkKCcjZHVlJykudmFsKChwYXJzZUZsb2F0KGFtZCkudG9GaXhlZCgyKSkgLSAocGFyc2VGbG9hdChkaXNjKS50b0ZpeGVkKDIpKSkudG9GaXhlZCgyKTtcbiAgfWVsc2V7XG4gICAgJCgnI2R1ZScpLnZhbChwYXJzZUZsb2F0KGFtZCkudG9GaXhlZCgyKSk7XG4gIH1cbn0pO1xuXG5cbiJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEVBQVosQ0FBZSxpREFBZixFQUFrRSxXQUFsRSxFQUErRSxZQUFXO0VBQ3hGLElBQUlDLEdBQUcsR0FBRyxJQUFWO0VBQ0FILENBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJJLElBQWpCLENBQXNCLFlBQVU7SUFDNUJELEdBQUcsSUFBSSxDQUFDSCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFLLEdBQVIsRUFBUjtFQUNILENBRkQ7RUFHQUwsQ0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQkssR0FBaEIsQ0FBb0JGLEdBQXBCO0VBQ0FILENBQUMsQ0FBQyxjQUFELENBQUQsQ0FBa0JLLEdBQWxCLENBQXNCRixHQUF0QjtBQUNELENBUEQsRSxDQVNBOztBQUNBSCxDQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZQyxFQUFaLENBQWUsbUJBQWYsRUFBb0MsaUJBQXBDLEVBQXVELFlBQVc7RUFDaEUsSUFBSUksR0FBRyxHQUFHTixDQUFDLENBQUMsWUFBRCxDQUFELENBQWdCSyxHQUFoQixFQUFWO0VBQ0EsSUFBSUUsSUFBSSxHQUFHUCxDQUFDLENBQUMsaUJBQUQsQ0FBRCxDQUFxQkssR0FBckIsRUFBWDs7RUFDQSxJQUFJRSxJQUFJLElBQUksRUFBUixJQUFjRCxHQUFHLElBQUksRUFBekIsRUFBNkI7SUFDM0JOLENBQUMsQ0FBQyxjQUFELENBQUQsQ0FBa0JLLEdBQWxCLENBQXVCRyxVQUFVLENBQUNGLEdBQUQsQ0FBVixDQUFnQkcsT0FBaEIsQ0FBd0IsQ0FBeEIsSUFBK0JELFVBQVUsQ0FBQ0YsR0FBRCxDQUFWLENBQWdCRyxPQUFoQixDQUF3QixDQUF4QixDQUFELElBQWlDRCxVQUFVLENBQUNELElBQUQsQ0FBVixDQUFpQkUsT0FBakIsQ0FBeUIsQ0FBekIsQ0FBRCxHQUErQixHQUEvRCxDQUFyRDtFQUNELENBRkQsTUFFSztJQUNIVCxDQUFDLENBQUMsY0FBRCxDQUFELENBQWtCSyxHQUFsQixDQUFzQkcsVUFBVSxDQUFDRixHQUFELENBQVYsQ0FBZ0JHLE9BQWhCLENBQXdCLENBQXhCLENBQXRCO0VBQ0Q7QUFDRixDQVJELEUsQ0FVQTs7QUFDQVQsQ0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsRUFBWixDQUFlLG1CQUFmLEVBQW9DLFFBQXBDLEVBQThDLFlBQVc7RUFDdkQsSUFBSUksR0FBRyxHQUFHTixDQUFDLENBQUMsY0FBRCxDQUFELENBQWtCSyxHQUFsQixFQUFWO0VBQ0EsSUFBSUUsSUFBSSxHQUFHUCxDQUFDLENBQUMsUUFBRCxDQUFELENBQVlLLEdBQVosRUFBWDs7RUFDQSxJQUFJRSxJQUFJLElBQUksRUFBUixJQUFjRCxHQUFHLElBQUksRUFBekIsRUFBNkI7SUFDM0JOLENBQUMsQ0FBQyxNQUFELENBQUQsQ0FBVUssR0FBVixDQUFlRyxVQUFVLENBQUNGLEdBQUQsQ0FBVixDQUFnQkcsT0FBaEIsQ0FBd0IsQ0FBeEIsQ0FBRCxHQUFnQ0QsVUFBVSxDQUFDRCxJQUFELENBQVYsQ0FBaUJFLE9BQWpCLENBQXlCLENBQXpCLENBQTlDLEVBQTRFQSxPQUE1RSxDQUFvRixDQUFwRjtFQUNELENBRkQsTUFFSztJQUNIVCxDQUFDLENBQUMsTUFBRCxDQUFELENBQVVLLEdBQVYsQ0FBY0csVUFBVSxDQUFDRixHQUFELENBQVYsQ0FBZ0JHLE9BQWhCLENBQXdCLENBQXhCLENBQWQ7RUFDRDtBQUNGLENBUkQifQ==\n//# sourceURL=webpack-internal:///./resources/js/subtotal.js\n");

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