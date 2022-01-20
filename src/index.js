const { Component, render, useState, useEffect } = wp.element;
const { apiFetch } = wp;

const News = ({ post }) => {
  return (
    <a href={post.link}>
      <article className="rounded shadow p-4">
        <h1>{post.title.rendered}</h1>
        <p>{post.date}</p>
      </article>
    </a>
  );
};

const PostList = () => {
  const [posts, setPosts] = useState([]);

  useEffect(() => {
    apiFetch({
      path: "/wp/v2/news",
      method: "get",
    })
      .then((result) => {
        console.log(result);
        setPosts(result);
      })
      .catch((err) => {
        console.log("sss");
      });
  }, []);

  return (
    <>
      <h2 class="text-lg text-gray-700">ニュース</h2>
      <div className="grid grid-cols-2 gap-4">
        {posts.map((i) => (
          <News post={i} />
        ))}
      </div>
    </>
  );
};

render(<PostList />, document.getElementById("root"));
