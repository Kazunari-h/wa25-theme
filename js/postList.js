const {Component, render, createElement, useState, useEffect} = wp.element
const {apiFetch} = wp
const e = createElement

const PostList = () => {
    const [posts, setPosts] = useState([])
    
    useEffect(() => {
        apiFetch({
            path: "/wp/v2/posts",
            method: "get"
        })
        .then((result) => {
            console.log(result);
            setPosts(result)
        }).catch((err) => {
            console.log("sss");
        });
    }, [])
    
    return createElement("div", null, posts.map(i => i.title.rendered).join())
    /*
        return 
    e(
        "a", 
        {
            href: "https://google.com",
            target: ""
        }, 
        e("span", null, "test"),
        "だよ"
    )
    */
}

render(createElement(PostList, null), document.getElementById("root"))
