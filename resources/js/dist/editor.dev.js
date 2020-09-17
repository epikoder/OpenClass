"use strict";

var _simplemde = _interopRequireDefault(require("simplemde"));

var _jquery = _interopRequireDefault(require("jquery"));

var _jqueryForm = _interopRequireDefault(require("jquery-form"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

var simplemde;
(0, _jquery["default"])(document).ready(function () {
  simplemde = new _simplemde["default"]();
});
(0, _jquery["default"])(document).on('submit', 'form', function (e) {
  e.preventDefault();
  (0, _jquery["default"])("form").ajaxForm({
    data: [function (content) {
      return simplemde.value();
    }],
    success: function success(response) {
      console.log(response);
    },
    error: function error(_error) {
      console.log(_error);
    }
  });
});