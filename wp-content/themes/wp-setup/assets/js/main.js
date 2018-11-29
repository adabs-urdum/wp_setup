(function($) {

  $.fn.Plugin = function() {
    var $main = $(this);

    function init(){
      setVars();
      bindEvents();
    }

    function setVars(){
    }

    function bindEvents(){
    }

    init();
  };

  function WebGLThreeJS(){
    var scene,
        camera,
        renderer;

    function init(){
      setVars();
      bindEvents();
      initThree();
      mainLoop();
    }

    function setVars(){
    }

    function bindEvents(){
    }

    function initThree(){
      createScene();
      createRenderer();
      createPerspectiveCamera();
    }

    function createScene(){
      scene = new THREE.Scene();
    }

    function createRenderer(){
      renderer = new THREE.WebGLRenderer();
      renderer.setSize(window.innerWidth, window.innerHeight);
      document.body.appendChild(renderer.domElement);
    }

    function createPerspectiveCamera(){
      camera = new THREE.PerspectiveCamera(30, window.innerWidth / window.innerHeight, 1, 501);
      camera.position.z = 10;
      camera.position.x = 0;
      camera.position.y = 0;
    }

    function mainLoop(){
      renderer.render(scene, camera);
      requestAnimationFrame(mainLoop);
    }

    init();
  }

})(jQuery);
