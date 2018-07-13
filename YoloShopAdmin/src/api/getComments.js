const getComments = () => (
  fetch('http://yoloshopvn.com/api/comment/get_list_comment')// eslint-disable-line
  .then(res => res.json())
);

export default getComments;
