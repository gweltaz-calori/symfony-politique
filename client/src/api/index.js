const config = {
  baseURL: 'http://politic.gweltaz-calori.com'
};

export const endpoints = {
  fetchPresidents: { method: get, path: '/presidents' },
  postPresidents: { method: post, path: '/presidents' },
  fetchPresident: { method: get, path: '/presidents/:presidentId' },
  fetchPresidentCoordinates: {
    method: get,
    path: '/presidents/:presidentId/coordinates'
  },
  fetchPresidentLaws: { method: get, path: '/presidents/:presidentId/laws' },
  postPresidentLaws: { method: post, path: '/presidents/:presidentId/laws' },
  getPresidentLaws: {
    method: get,
    path: '/presidents/:presidentId/laws/:lawId'
  },

  fetchLaws: { method: get, path: '/laws' },
  fetchLaw: { method: get, path: '/laws/:law' },
  fetchLawsVotes: { method: get, path: '/laws/:law/votes' },
  postLawsVotes: { method: post, path: '/laws/:law/votes' },

  fetchPersons: { method: get, path: '/persons' },
  postPersons: { method: post, path: '/persons' },
  fetchPerson: { method: get, path: '/persons/:personId' }
};

function computeURI(path, params) {
  if (!params) {
    return path;
  }
  let realPath;
  Object.keys(params).forEach(key => {
    realPath = path.replace(`:${key}`, params[key]);
  });
  return realPath;
}

async function get(path, data) {
  const uri = data ? computeURI(path, data.params) : path;
  return await fetch(`${config.baseURL}${uri}`).then(res => res.json());
}

async function post(path, data) {
  const uri = data ? computeURI(path, data.params) : path;
  return await fetch(`${config.baseURL}${uri}`, {
    method: 'POST',
    body: data
  }).then(res => res.json());
}

const api = {};
Object.keys(endpoints).forEach(key => {
  api[key] = data => endpoints[key].method(endpoints[key].path, data);
});

export default api;
