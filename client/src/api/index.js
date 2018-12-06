const config = {
  baseURL: 'http://politic.gweltaz-calori.com'
};

export const endpoints = {
  fetchPresidents: { method: get, path: '/presidents' },
  postPresidents: { method: post, path: '/presidents' },
  fetchPresident: { method: get, path: '/presidents/:presidentUuid' },
  fetchPresidentCoordinates: {
    method: get,
    path: '/presidents/:presidentUuid/coordinates'
  },
  fetchPresidentLaws: { method: get, path: '/presidents/:presidentUuid/laws' },
  postPresidentLaws: { method: post, path: '/presidents/:presidentUuid/laws' },
  getPresidentLaws: {
    method: get,
    path: '/presidents/:presidentUuid/laws/:lawUuid'
  },

  fetchParties: { method: get, path: '/parties' },
  fetchParty: { method: get, path: '/parties/:partyUuid' },

  fetchLaws: { method: get, path: '/laws' },
  fetchLaw: { method: get, path: '/laws/:lawUuid' },
  fetchLawsVotes: { method: get, path: '/laws/:lawUuid/votes' },
  postLawsVotes: { method: post, path: '/laws/:lawUuid/votes' },

  fetchPersons: { method: get, path: '/persons' },
  postPersons: { method: post, path: '/persons' },
  fetchPerson: { method: get, path: '/persons/:personUuid' }
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

async function get(path, data, cb) {
  const uri = data ? computeURI(path, data.params) : path;
  return await fetch(`${config.baseURL}${uri}`).then(res => {
    if (cb) {
      cb();
    }
    return res.json();
  });
}

async function post(path, data, cb) {
  const uri = data ? computeURI(path, data.params) : path;
  return await fetch(`${config.baseURL}${uri}`, {
    headers: {
      'Content-Type': 'application/json'
    },
    method: 'POST',
    body: JSON.stringify(data.body)
  }).then(res => {
    if (cb) {
      cb();
    }
    return res;
  });
}

const api = {};
Object.keys(endpoints).forEach(key => {
  api[key] = (data, cb) => endpoints[key].method(endpoints[key].path, data, cb);
});

export default api;
