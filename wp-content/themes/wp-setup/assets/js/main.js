"use strict";

import "babel-polyfill";
import Swiper from "swiper";
import GACE from "./components/googleAnalyticsCustomEvents";

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
  // set GA-ID
  // const gace = new GACE({
  //   id: "UA-164327129-1",
  // });

  var mySwiper = new Swiper(".gallery", {
    speed: 400,
    spaceBetween: 0,
  });

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
