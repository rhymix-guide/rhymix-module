import { defineConfig } from 'vitepress'

// https://vitepress.dev/reference/site-config
export default defineConfig({
  title: "My Awesome Project",
  description: "A VitePress Site",
  // 👉 저장소 이름
  base: "/rhymix-module/",
  themeConfig: {
    // https://vitepress.dev/reference/default-theme-config

    // 상단 메뉴
    nav: [
      { text: 'Home', link: '/' },
      { text: 'Examples', link: '/markdown-examples' }
    ],

    // 왼쪽 메뉴
    sidebar: [
      {
        text: 'Examples',
        items: [
          { text: 'Markdown Examples', link: '/markdown-examples' },
          { text: 'Runtime API Examples', link: '/api-examples' }
        ]
      }
    ],

    search: {
      // 로컬 검색 기능 활성화
      provider: 'local',
    },

    // 👉 소셜 링크
    socialLinks: [
      { icon: 'github', link: 'https://github.com/rhymix-guide/rhymix-module' }
    ]
  },

  // 👉 사이트맵
  sitemap: {
    hostname: 'https://rhymix-guide.github.io/rhymix-module/',
  },
})
