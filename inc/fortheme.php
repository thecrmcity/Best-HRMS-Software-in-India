<style type="text/css">


	.grows {
  animation: grows 2s ease infinite;
}
@keyframes grows {
  from { transform: scale(0); }
  to { transform: scale(1); }
}

.fade-ins {
  animation: fade-ins 2s linear infinite;
}
@keyframes fade-ins {
  from { opacity: 0; }
  to { opacity: 1; }
}

.fade-outs {
  animation: fade-outs 2s linear infinite;
}
@keyframes fade-outs {
  from { opacity: 1; }
  to { opacity: 0; }
}


.bounces {
  animation: bounces 2s ease infinite;
}
@keyframes bounces {
    70% { transform:translateY(0%); }
    80% { transform:translateY(-15%); }
    90% { transform:translateY(0%); }
    95% { transform:translateY(-7%); }
    97% { transform:translateY(0%); }
    99% { transform:translateY(-3%); }
    100% { transform:translateY(0); }
}

.bounces2 {
  animation: bounces2 2s ease infinite;
}
@keyframes bounces2 {
	0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
	40% {transform: translateY(-30px);}
	60% {transform: translateY(-15px);}
}

.shakes {
  animation: shakes 2s ease infinite;
}
@keyframes shakes {
	0%, 100% {transform: translateX(0);}
	10%, 30%, 50%, 70%, 90% {transform: translateX(-10px);}
	20%, 40%, 60%, 80% {transform: translateX(10px);}
}

.flips {
	backface-visibility: visible !important;
	animation: flips 2s ease infinite;
}
@keyframes flips {
	0% {
		transform: perspective(400px) rotateY(0);
		animation-timing-function: ease-out;
	}
	40% {
		transform: perspective(400px) translateZ(150px) rotateY(170deg);
		animation-timing-function: ease-out;
	}
	50% {
		transform: perspective(400px) translateZ(150px) rotateY(190deg) scale(1);
		animation-timing-function: ease-in;
	}
	80% {
		transform: perspective(400px) rotateY(360deg) scale(.95);
		animation-timing-function: ease-in;
	}
	100% {
		transform: perspective(400px) scale(1);
		animation-timing-function: ease-in;
	}
}

.fade-downs {
  animation: fade-downs 2s ease infinite;
}
@keyframes fade-downs {
  0% {
    opacity: 1;
    transform: translateY(0);
  }
  100% {
    opacity: 0;
    transform: translateY(20px);
  }
}

.fade-rights {
  animation: fade-rights 2s ease infinite;
}
@keyframes fade-rights {
  0% {
    opacity: 1;
    transform: translateX(0);
  }
  100% {
    opacity: 0;
    transform: translateX(20px);
  }
}


.bounce-ins {
  animation: bounce-ins 2s ease infinite;
}
@keyframes bounce-ins {
  0% {
    opacity: 0;
    transform: scale(.3);
  }
  50% {
    opacity: 1;
    transform: scale(1.05);
  }
  70% { transform: scale(.9); }
  100% { transform: scale(1); }
}

.bounce-in-rights {
  animation: bounce-in-rights 2s ease infinite;
}
@keyframes bounce-in-rights {
  0% {
    opacity: 0;
    transform: translateX(50px);
  }
  60% {
    opacity: 1;
    transform: translateX(-30px);
  }
  80% { transform: translateX(10px); }
  100% { transform: translateX(0); }
}

.bounce-in-lefts {
  animation: bounce-in-lefts 2s ease infinite;
}
@keyframes bounce-in-lefts {
  0% {
    opacity: 0;
    transform: translateX(-50px);
  }
  70% {
    opacity: 1;
    transform: translateX(30px);
  }
  80% { transform: translateX(10px); }
  100% { transform: translateX(0); }
}

.bounce-outs {
  animation: bounce-outs 2s ease infinite;
}
@keyframes bounce-outs {
  0% { transform: scale(1); }
  25% { transform: scale(.95); }
  50% {
    opacity: 1;
    transform: scale(1.1);
  }
  100% {
    opacity: 0;
    transform: scale(.3);
  } 
}

.bounce-out-downs {
  animation: bounce-out-downs 2s ease infinite;
}
@keyframes bounce-out-downs {
  0% { transform: translateY(0); }
  20% {
    opacity: 1;
    transform: translateY(-20px);
  }
  100% {
    opacity: 0;
    transform: translateY(20px);
  }
}

.rotate-in-down-lefts {
  animation: rotate-in-down-lefts 2s ease infinite;
}
@keyframes rotate-in-down-lefts {
  0% {
    transform-origin: left bottom;
    transform: rotate(-90deg);
    opacity: 0;
  }
  100% {
    transform-origin: left bottom;
    transform: rotate(0);
    opacity: 1;
  }
}

.rotate-in-up-lefts {
  animation: rotate-in-up-lefts 2s ease infinite;
}
@keyframes rotate-in-up-lefts {
  0% {
    transform-origin: left bottom;
    transform: rotate(90deg);
    opacity: 0;
  }
  100% {
    transform-origin: left bottom;
    transform: rotate(0);
    opacity: 1;
  }
}


.roll-ins {
  animation: roll-ins 2s ease infinite;
}
@keyframes roll-ins {
  0% {
    opacity: 0;
    transform: translateX(-100%) rotate(-120deg);
  }
  100% {
    opacity: 1;
    transform: translateX(0px) rotate(0deg);
  }
}

.roll-outs {
  animation: roll-outs 2s ease infinite;
}
@keyframes roll-outs {
    0% {
    opacity: 1;
    transform: translateX(0px) rotate(0deg);
  }
  100% {
    opacity: 0;
    transform: translateX(100%) rotate(120deg);
  }
}


.hinges {
  animation: hinges 2s ease infinite;
}
@keyframes hinges {
  0% { transform: rotate(0); transform-origin: top left; animation-timing-function: ease-in-out; }  
  20%, 60% { transform: rotate(80deg); transform-origin: top left; animation-timing-function: ease-in-out; }  
  40% { transform: rotate(60deg); transform-origin: top left; animation-timing-function: ease-in-out; } 
  80% { transform: rotate(60deg) translateY(0); opacity: 1; transform-origin: top left; animation-timing-function: ease-in-out; } 
  100% { transform: translateY(100px); opacity: 0; }
}

.elastic-spins {
  animation: elastic-spins 1s infinite ease;
}
@keyframes elastic-spins {
  from { transform: rotate(0deg); }
  to { transform: rotate(720deg); }
}

</style>