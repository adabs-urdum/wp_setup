(function($) {

  class TestClass{
    constructor(one, two){
      console.log('TestClass -- constructor');
      this.one = one;
      this.two = two;
      console.log(this.one + ' ' + this.two);
    }
  }

  $.fn.customGoogleAnalyticsEvents = function() {
    let $main = $(this),
        $button;

    function init(){
      setVars();
      bindEvents();
    }

    function setVars(){
    }

    function bindEvents(){
      $button.on('click', handleClick);
    }

    function handleClick(e){
      const $button = $(this);
      const type = $button.data('type');

      // Send header contact clicked
      // ga('send', 'event', 'Header', 'contact button clicked', type, $button);
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
