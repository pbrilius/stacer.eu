import _ from 'lodash';
import 'svelte';

function component() {
  const element = document.createElement('p');
  element.setAttribute('class', 'text-left');

  // Lodash included by default
  element.innerHTML = _.join(['Hello', 'webpack', '!'], ' ');

  return element;
}

document.body.getElementsByClassName('container container-lg')[0].appendChild(component());
console.log('hello, npm-watch!');

import Index from '../components/index.svelte';

const index = new Index({
	target: document.getElementById('content'),
	props: {
		message: 'Hello svelte.js!'
	}
});

export default index;
