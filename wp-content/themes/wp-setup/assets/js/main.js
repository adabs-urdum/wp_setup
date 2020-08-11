"use strict";

import "babel-polyfill";

Array.prototype.shuffle = function () {
  return this.sort(function () {
    return Math.random() - 0.5;
  });
};

Array.prototype.getRandomValue = function () {
  return this.shuffle()[0];
};

Array.prototype.uniqueValues = function () {
  return [...new Set(this)];
};

document.addEventListener("DOMContentLoaded", function () {
  class TestClass {
    constructor() {
      this.bindEvents();
    }

    bindEvents = () => {
      window.addEventListener("resize", this.onWindowResize);
    };

    onWindowResize = (e) => {
      console.log("onWindowResize");
    };
  }

  const testInstance = new TestClass();
});
